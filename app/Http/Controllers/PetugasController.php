<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    //halaman utama
    public function dashboard()
    {

        $petugas = auth()->guard("petugas")->user();

        $laporan = $petugas->laporan();

        // di ambil karena bedasarkan id dari petugas atau relatioship jadi jika sudah di tugaskan mana akan terhitung laporan untuk petugas
        $total_laporan_ditugaskan = (clone $laporan)->where("status", "ditugaskan")->count();
        $total_laporan_selesai = (clone $laporan)->where("status", "selesai")->count();
        $total_laporan_pending = (clone $laporan)->where("status", "pending")->count();

        // chart data 
        // data laporan semua yang berkaitan
        $data_aktifitas_laporan = $petugas->laporan()->selectRaw('status, COUNT(*) as total')
            ->whereIn('status', ['pending', 'selesai', 'ditugaskan', "urgent"])
            ->groupBy('status')
            ->pluck('total', 'status');
        // hasil :
        //     [
        //   "pending"     => 2,
        //   "success"     => 3,
        //   "ditugaskan"  => 5
        // "urgent" => 1
        // ]

        $laporan_terbaru = $petugas->laporan()->latest()->limit(5)->get(); // sudah dengan katagory id karena di admin

        $data = [
            "petugas" => $petugas,
            "total_laporan_ditugaskan" => $total_laporan_ditugaskan,
            "total_laporan_selesai" => $total_laporan_selesai,
            "total_laporan_pending" => $total_laporan_pending,
            "data_aktifitas_laporan" => $data_aktifitas_laporan,
            "laporan_terbaru" => $laporan_terbaru,
        ];

        return view("petugas.dashboard", $data);
    }
    public function profileView()
    {
        $petugas = auth()->guard("petugas")->user();

        $total_laporan_selesai = $petugas->laporan()->where("status", "selesai")->count();
        $total_laporan_ditugaskan = $petugas->laporan()->where("status", "ditugaskan")->count();
        $total_laporan_urgent = $petugas->laporan()->where("status", "urgent")->count();



        return view("petugas.profile")->with([
            "petugas" => $petugas,
            "total_laporan_selesai" => $total_laporan_selesai,
            "total_laporan_urgent" => $total_laporan_urgent,
            "total_laporan_ditugaskan" => $total_laporan_ditugaskan,
        ]);
    }
    public function profileEditView()
    {
        return view("petugas.profile-edit");
    }
    public function profileEditPut() {}

    public function signInView()
    {
        return View("petugas.sign-in");
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


        $cridentials = $request->only("username", "password"); // sesuai nama table

        if (Auth::guard("petugas")->attempt($cridentials)) {

            $request->session()->regenerate();
            return redirect()->route("petugas.dashboard")->with("info", "selamat datang " . $cridentials["username"]);
        }
        return back()
            ->withInput($request->only('username', "password"))
            ->with('error', 'Login gagal. Username atau password salah.');
    }

    public function signUpView()
    {
        return View("petugas.sign-up");
    }

    public function signUpPost(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3|max:30',
            'email'    => 'required|email|unique:petugas,email',
            'invite_code' => 'required|string',
            'password' => 'required|min:6',
        ]);

        if (auth()->guard("petugas")->check()) {
            return redirect()->route("petugas.dashboard")->with("info", "selamat datang" . $request->input("username"));
        }

        if (!$validated) {
            return redirect()->back()->with("error", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validated)->withInput();
        }

        $admin = Admin::where("invite_code", "SBR-" . $validated["invite_code"]);
        $admin_id = (clone $admin)->pluck("id")->first();
        $admin_code = (clone $admin)->pluck("invite_code")->first();


        if (!$admin || $admin_code !== "SBR-" . $validated["invite_code"]) {
            return redirect()->back()->with("warning", "Kode undangan tidak valid. Silahkan periksa kembali kode undangan Anda.")->withInput();
        }
        // simpan ke database
        $petugas = Petugas::create([
            "username" =>  $validated["username"],
            // password simpan dalam bentuk hash
            "password" => Hash::make($validated["password"]),
            "email" => $validated['email'],

            "admin_id" => $admin_id,
            'invite_code' => "SBR-" . $validated["invite_code"],
        ]);
        auth()->guard("petugas")->login($petugas); // petugas auto login

        return redirect()->route('petugas.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {

        $username = auth()->guard("petugas")->user()->username;

        Auth::guard("petugas")->logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect()->route("index")->with('info', 'Anda telah logout ' . $username);
    }

    // untuk handle nya ada di  controller Laporan
    public function laporanView()

    {
        $petugas = auth()->guard("petugas")->user();
        $laporan_ditugaskan = $petugas->laporan()->where("status", "ditugaskan")->get();

        return view("petugas.laporan", compact("laporan_ditugaskan"));
    }

    public function historyView()
    {
        $petugas = auth()->guard("petugas")->user();
        $laporan_status = $petugas->laporan()->where("status", ["selesai", "ditugaskan"])->get();


        return view("petugas.history", compact("laporan_status"));
    }
    public function mapView()
    {

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


        return view("petugas.peta-lokasi");
    }
}
