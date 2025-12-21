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
        return view("petugas.dashboard");
    }
    public function profileView()
    {
        $petugas = auth()->guard("petugas")->user();


        return view("petugas.profile")->with([
            "petugas" => $petugas,
        ]);
    }

    public function signInView()
    {
        return View("petugas.sign-in");
    }

    public function signInPost(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'password' => 'required'
        ]);

        // $cridentials = $request->only("username", "password"); // sesuai nama table

        if (Auth::attempt(['name' => $request->input('username'), 'password' => $request->input('password')])) {

            $request->session()->regenerate();
            return redirect()->route("petugas.dashboard")->with("info", "selamat datanag petugas" . $request->user()->name);
        } else {
            return redirect()->back()->with("error", "nama dan password salah atau tidak ada  sialhkan login ualng ");
        }
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
        // auth() sama denagn Auth

        if (auth()->guard("petugas")->check()) {
            return redirect()->route("petugas.dashboard")->with("info", "selamat datang" . $request->input("username"));
        }

        if (!$validated) {
            return redirect()->back()->with("error", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validated)->withInput();
        }

        $admin = Admin::where("invite_code", "SBR-" . $validated["invite_code"]);
        $admin_id = $admin->pluck("id")->first();
        $admin_code = $admin->pluck("invite_code")->first();


        if (!$admin || $admin_code !== "SBR-" . $validated["invite_code"]) {
            return redirect()->back()->with("warning", "Kode undangan tidak valid. Silahkan periksa kembali kode undangan Anda.")->withInput();
        }
        // simpan ke database
        $petugas = Petugas::create([
            "name" =>  $validated["username"],
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

        $username = auth()->guard("petugas")->user()->name;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("index")->with('info', 'Anda telah logout.' . $username);
    }

    // untuk handle nya ada di  controller Laporan
    public function laporanView()

    {
        $petugas = auth()->guard("petugas")->user();
        $laporan_ditugaskan = Laporan::with("petugas")->find(id: $petugas->id)->where("status", "ditugaskan")->get();

        return view("petugas.laporan", compact("laporan_ditugaskan"));
    }

    public function historyView()
    {
        $petugas = auth()->guard("petugas")->user();
        $laporan_selesai = Laporan::with("petugas")->find(id: $petugas->id)->where("status", "selesai")->get();

        return view("petugas.history", compact("laporan_selesai"));
    }
    public function mapView()
    {
        // ini masih belum tau kenapa auto sugestion tidak mengenalinya , nantik di handle aja
        // $response_map =    GoogleMaps::load('geocoding')
        //     ->setParam([
        //         'address' => 'Monas, Jakarta'
        //     ])
        //     ->get();


        return view("petugas.peta-lokasi");
    }
}
