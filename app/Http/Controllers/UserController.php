<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Petugas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;


class UserController extends Controller
{
    public function dashboard()
    {

        $user = auth()->user();

        $baseLaporan = $user->laporan(); // ambil laporan yang ada user

        $total_laporan = (clone $baseLaporan)->count();
        $total_laporan_selesai = (clone $baseLaporan)
            ->where('status', 'selesai')
            ->count();
        $laporan_terbaru = (clone $baseLaporan)
            ->latest()
            ->limit(5)
            ->get();

        // data untuk chart
        // $data_status_laporan = $user->laporan()->select("status", DB::raw("count(*) as total"))
        //     ->groupBy("status")
        //     ->pluck("total")
        //     ->toArray();
        $data_status_laporan = $user->laporan()
            ->selectRaw('status, COUNT(*) as total')
            ->whereIn('status', ['pending', 'selesai', 'ditugaskan', 'urgent'])
            ->groupBy('status')
            ->pluck('total', 'status');
        // hasil :
        //     [
        //   "pending"     => 2,
        //   "success"     => 3,
        //   "ditugaskan"  => 5
        //  "urgent=>2       
        // ]

        // ini hanya data untuk setiap minggu
        //     $data_laporan_mingguan = $user->laporan()
        //         ->selectRaw('
        //     YEARWEEK(created_at, 1) as minggu,
        //     DATE_FORMAT(MIN(created_at), "%d-%m-%Y") as tanggal_minggu,
        //     COUNT(*) as total
        // ')
        //         ->groupBy('minggu') // hasil sql
        //         ->orderBy('minggu')
        //         ->get();
        //     // hasil :
        //     //             [
        //     //   { "tanggal": "2025-12-20", "total": 30 },
        //     //   { "tanggal": "2025-12-21", "total": 18 },
        //     //   { "tanggal": "2025-12-22", "total": 12 }
        //     // ]

        $hariIni = Carbon::today();
        $tujuhHariLalu = $hariIni->copy()->subDays(6); // termasuk hari ini

        $data_laporan_mingguan = $user->laporan()
            ->whereBetween('created_at', [$tujuhHariLalu->startOfDay(), $hariIni->endOfDay()])
            ->selectRaw('
        DATE(created_at) as tanggal,
        COUNT(*) as total
    ')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();
        // example , hasilnya :
        // [
        //   { "tanggal": "2025-12-18", "total": 12 },
        //   { "tanggal": "2025-12-19", "total": 8 },
        //   { "tanggal": "2025-12-20", "total": 30 },
        //   { "tanggal": "2025-12-21", "total": 18 },
        //   { "tanggal": "2025-12-22", "total": 12 },
        //   { "tanggal": "2025-12-23", "total": 25 },
        //   { "tanggal": "2025-12-24", "total": 20 }
        // ]




        $basePetugas = Petugas::where("invite_code", $user->invite_code);

        $petugas_paginate = $basePetugas->simplePaginate();
        $petugas_total = (clone $basePetugas)->count();


        return view("user.dashboard", compact("user", "total_laporan", "total_laporan_selesai", "laporan_terbaru", "data_laporan_mingguan", "data_status_laporan", "petugas_paginate", "petugas_total"));
    }
    // halaman profile User
    public function profileView()
    {
        $user = auth()->user();
        $laporan_activity = $user->laporan()->latest()->take(5)->get();

        $laporan_total = $user->laporan()->count();

        return view("user.profile", compact("user", "laporan_activity", "laporan_total"));
    }
    public function profileEditView()
    {
        return view("user.profile-edit");
    }
    public function profileEditPut() {}

    public function signInView()
    {
        return View("user.sign-in");
    }


    public function signInPost(Request $request)
    {


        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        // Ambil data hasil validasi
        $credentials = [
            'username'     => $validated['username'],
            'password' => $validated['password'],
        ];


        if (Auth::guard("users")->attempt($credentials)) {
            $request->session()->regenerate(); // cegah session fixation

            return redirect()
                ->route('user.dashboard')
                ->with('success', 'Selamat datang, ' . $credentials['username'] . '!');
        }

        return back()
            ->with('error', 'Login gagal. Username atau password salah.')->withInput($request->only("username"));


        /* // login cara sebelumnya manual  */
        /* if ($name &&  Hash::check($password, $name->password)) { */
        /**/
        /*     // Login berhasil */
        /*     Auth::login($name); // Login kan Usernya */
        /*     return redirect()->route("user.dashboard")->with("success", "Selamat datang, $name!"); */
        /* } else { */
        /*     // Jika user tidak ditemukan, lakukan sesuatu */
        /*     return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda."); */
        /* } */
    }
    public function signUpView()
    {
        return View("user.sign-up");
    }

    public function signUpPost(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|min:3|max:30',
            'email'    => 'required|email|unique:users,email', // sesui dengan nama table dan isi field
            'password' => 'required|min:6',
            'invite_code' => 'required|string',
        ]);

        // cek jika user sudah login
        if (Auth::check()) {
            return redirect()->route("user.dashboard")->with("info", "selamat datang" . $request->input("username"));
        }

        if (!$validated) {
            return redirect()->back()->with("error", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validated)->withInput();
        }

        // dapatkan id admin berdasarkan invite_code
        $admin = Admin::where("invite_code", 'SBR-' . $validated["invite_code"]);
        $admin_id = $admin->pluck("id")->first(); // pluck untuk mengambil satu nilai saja
        $admin_code = $admin->pluck("invite_code")->first();

        if (!$admin || $admin_code !== "SBR-" . $validated["invite_code"]) {
            return redirect()->back()->with("warning", "Kode undangan tidak valid. Silahkan periksa kembali input Anda.")->withInput();
        }

        // simpan ke database
        $user = User::create([
            "username" =>  $validated["username"],
            "admin_id" => $admin_id,
            "password" => Hash::make($validated["password"]),
            "email" => $validated['email'],
            "invite_code" => "SBR-" . $validated["invite_code"],
        ]);
        Auth::guard("users")->login($user); // user auto login

        return redirect()->route('user.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {

        $username = auth()->user()->username;
        if (!$username) {
            return redirect()->back()->with("warning", "kamu bukan user ");
        }

        Auth::guard("users")->logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        $message = sprintf('Anda telah logout, %s.', $username);

        return redirect()->route("index")->with('info', $message);
    }


    // untuk handle nya ada di  controller Laporan
    public function laporanView()
    {
        /* $laporan_users = $user->laporan()->with('user')->get(); */  // bisa juga , karena hasMay ke table Laporan
        $laporan_selesai = Laporan::with("user")->where("status", "selesai")->get();
        return view("user.laporan");
    }

    // history history terkait user
    public function historyView()
    {
        $user = auth()->user();

        $laporan_users = Laporan::with('user')
            ->where('user_id', $user->id)   // FK user_id
            ->get();

        return view("user.history", compact("laporan_users", "user"));
    }
    public function mapView()
    {
        $user = auth()->user();

        // API TIDAK BISA DI AKSES ATAU DINIE ( mintak pembayaran mungkin wkwkw), jadi fitur ini di tuda dahulu
        // $response = GoogleMaps::load('geocoding')
        //     ->setParam([
        //         'address' => $user->address ?: 'Aceh Besar, Indonesia',
        //     ])
        //     ->get();

        // $data = json_decode($response, true);

        // if ($data['status'] !== 'OK' || empty($data['results'])) {
        //     return redirect()
        //         ->back()
        //         ->with('error', 'Gagal mendapatkan koordinat lokasi');
        // }

        // $location = $data['results'][0]['geometry']['location'];

        // $lokasi_user = [
        //     'lat' => $location['lat'],
        //     'lng' => $location['lng'],
        // ];


        return view("user.peta-lokasi");
    }
}
