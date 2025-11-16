<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    //halaman utama
    public function petugas()
    {
        return view("petugas.petugas");
    }

    public function SignInViews()
    {
        return View("petugas.sign-in");
    }

    public function SignInPost(Request $request)
    {
        $name = $request->input('username');
        $password = $request->input('password');

        if ($name &&   Hash::check($password, $name->password)) {

            // Login berhasil
            Auth::login($name); // Login kan Usernya
            return redirect()->route("petugas.")->with("success", "Selamat datang, $name!");
        } else {
            // Jika user tidak ditemukan, lakukan sesuatu
            return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda.");
        }
    }
}
