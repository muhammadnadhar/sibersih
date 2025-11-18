<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view("user.dashboard");
    }
    // halaman profile User
    public function profile()
    {
        return view("user.profile");
    }

    public function signInViews()
    {
        return View("user.sign-in");
    }


    public function signInPost(Request $request)
    {

        $name = $request->input('username');
        $password = $request->input('password');

        // ambil data d
        if ($name &&  Hash::check($password, $name->password)) {

            // Login berhasil
            Auth::login($name); // Login kan Usernya
            return redirect()->route("user.dashboard")->with("success", "Selamat datang, $name!");
        } else {
            // Jika user tidak ditemukan, lakukan sesuatu
            return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda.");
        }
    }
    public function signUpView()
    {
        return View("user.sign-up");
    }

    public function signUpPost(Request $request)
    {
        $name = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");

        // simpan ke database 
        User::create([
            "username" =>  $name,
            // password simpan dalam bentuk hash 
            "pasword" => Hash::make($password),
            "email" => $email,
        ]);
    }
}
