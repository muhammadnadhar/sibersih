<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;


class UserController extends Controller
{
    public function dashboard()
    {

        $user_id = auth()->user()->id;
        $laporans = Laporan::with("user")->where("user_id", $user_id)->get();

        $total_laporan = $laporans->count();
        $laporan_selesai = $laporans->where("status", "selesai"); //adalah laporan succes bagia user
        $total_laporan_selesai = $laporan_selesai->count();


        return view("user.dashboard", compact("total_laporan", "total_laporan_selesai"));
    }
    // halaman profile User
    public function profile()
    {
        return view("user.profile");
    }

    public function signInView()
    {
        return View("user.sign-in");
    }


    public function signInPost(Request $request)
    {


        $name = $request->input('username');
        $password = $request->input('password');

        /* //  cara sebelumnya manual  */
        /* if ($name &&  Hash::check($password, $name->password)) { */
        /**/
        /*     // Login berhasil */
        /*     Auth::login($name); // Login kan Usernya */
        /*     return redirect()->route("user.dashboard")->with("success", "Selamat datang, $name!"); */
        /* } else { */
        /*     // Jika user tidak ditemukan, lakukan sesuatu */
        /*     return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda."); */
        /* } */
        // otomatis login dan cek password dan name
        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            $request->session()->regenerate(); // sesion
            return redirect()->route('user.dashboard')->with("info", "welcome " . $name);
        } else {
            return redirect()->back()->with("error", "Login gagal. Periksa username dan password Anda.");
        }
    }
    public function signUpView()
    {
        return View("user.sign-up");
    }

    public function signUpPost(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|min:3|max:30|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // cek jika user sudah login

        if (Auth::check()) {
            return redirect()->route("user.dashboard")->with("info", "selamat datang" . $request->input("username"));
        }

        // dapatkan id admin berdasarkan invite_code
        $admin_id = Admin::where("invite_code", $validated["invite_code"])->first()->id;

        // simpan ke database
        $user = User::create([
            "username" =>  $validated["username"],
            "admin_id" => $admin_id,
            // password simpan dalam bentuk hash
            "password" => Hash::make($validated["password"]),
            "email" => $validated['email'],
        ]);
        Auth::login($user); // user auto login

        return redirect()->route('user.dashboard')
            ->with('success', 'Akun berhasil dibuat!');
    }

    // untuk handle nya ada di  controller Laporan
    public function laporanView()
    {
        return view("user.laporan");
    }

    // history history terkait user
    public function historyView()
    {
        $user = auth()->user()->name;
        $laporan_users = Laporan::with(["user", "petugas"])->where("nama_pelapor", value: $user)->get();

        return view("user.history", compact("laporan_users"));
    }
    public function mapView()
    {
        // ini masih belum tau kenapa auto sugestion tidak mengenalinya , nantik di handle aja
        $response_map =    GoogleMaps::load('geocoding')
            ->setParam([
                'address' => 'Monas, Jakarta'
            ])
            ->get();

        return view("user.peta-lokasi");
    }
}
