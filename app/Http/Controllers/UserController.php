<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $basePetugas = Petugas::where("invite_code", $user->invite_code);

        $petugas_paginate = $basePetugas->simplePaginate();
        $petugas_total = (clone $basePetugas)->count();


        return view("user.dashboard", compact("user", "total_laporan", "total_laporan_selesai", "laporan_terbaru", "petugas_paginate", "petugas_total"));
    }
    // halaman profile User
    public function profileView()
    {
        $user = auth()->user();

        // tampilkan aktivitas dari table table user
        $laporan_activity = Laporan::with("user")->where("user_id", $user->id)->latest()->get();

        return view("user.profile", compact("user", "laporan_activity"));
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


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // cegah session fixation

            return redirect()
                ->route('user.dashboard')
                ->with('success', 'Selamat datang, ' . $credentials['name'] . '!');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Login gagal. Username atau password salah.');


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
        Auth::login($user); // user auto login

        return redirect()->route('user.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {

        $username = auth()->user()->username;
        if (!$username) {
            return redirect()->back()->with("warning", "kamu bukan user ");
        }

        Auth::logout();

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
