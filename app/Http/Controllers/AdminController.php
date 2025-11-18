<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // index
    public function dashboard()
    {
        // ambil user id yang login saat ini 
        $admin = Admin::with('users')->find(Auth::guard('admin')->id());

        // Pagination user milik admin
        $users = $admin->users()->paginate(5);
        return view("admin.dashboard", compact("users", "admin"));
    }
    public function signInView()
    {
        return View("admin.sign-in");
    }

    public function signInPost(Request $request)
    {
        $name = $request->input('username');
        $password = $request->input('password');

        if ($name &&   Hash::check($password, $name->password)) {

            // Login berhasil
            Auth::guard("petugas")->login($name); // Login kan Petugasnya
            return redirect()->route("petugas.dashboard")->with("success", "Selamat datang, $name!");
        } else {
            // Jika user tidak ditemukan, lakukan sesuatu
            return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda.");
        }
    }
    public function signUpView()
    {
        return view("admin.sign-up");
    }
    public function signUpPost(Request $request)
    {

        $name = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");

        // simpan ke database 
        Admin::create([
            "username" =>  $name,
            // password simpan dalam bentuk hash 
            "pasword" => Hash::make($password),
            "email" => $email,
        ]);
    }
}
