<?php

namespace App\Http\Controllers;

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
    public function profile()
    {
        return view("petugas.profile");
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

        $cridentials = $request->only("username", "password");

        if (Auth::attempt($cridentials)) {

            $request->session()->regenerate();
            return redirect()->route("petugas.dashboard")->with("info", "selamat datanag petugas" . $request->user()->name);
        } else {
            return redirect()->back()->with("error", "nama dan password salah sialhkan login ualng ");
        }
    }

    public function signUpView()
    {
        return View("petugas.sign-up");
    }

    public function signUpPost(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3|max:30|unique:users,username',
            'email'    => 'required|email|unique:petugas,email',
            'password' => 'required|min:6',
        ]);

        // auth() sama denagn Auth
        if (auth()->guard("petugas")->check()) {
            return redirect()->route("petugas.dashboard")->with("info", "selamat datang" . $request->input("username"));
        }

        // cek bukan Admin atau petugas

        // simpan ke database
        $petugas = Petugas::create([
            "username" =>  $validated["username"],
            // password simpan dalam bentuk hash
            "password" => Hash::make($validated["password"]),
            "email" => $validated['email'],
        ]);
        auth()->guard("petugas")->login($petugas); // petugas auto login

        return redirect()->route('petugas.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    // untuk handle nya ada di  controller Laporan
    public function laporanView()
    {
        return view("petugas.laporan");
    }
}
