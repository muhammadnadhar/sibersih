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

        $user = auth()->user();
        $laporans = Laporan::where("nama_pelapor", $user->username)->get();

        $total_laporan = $laporans->count();
        $laporan_selesai = $laporans->where("status", "selesai"); //adalah laporan succes bagia user
        $total_laporan_selesai = $laporan_selesai->count();


        return view("user.dashboard", compact("user", "total_laporan", "total_laporan_selesai"));
    }
    // halaman profile User
    public function profileView()
    {
        $user = auth()->user();

        // tampilkan aktivitas dari table table user
        $laporan_activity = Laporan::with("user")->where("user_id", $user->id)->latest()->get();

        return view("user.profile", compact("user", "laporan_activity"));
    }

    public function signInView()
    {
        return View("user.sign-in");
    }


    public function signInPost(Request $request)
    {


        $name = $request->input('username');
        $password = $request->input('password');

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
            "name" =>  $validated["username"],
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

        $username = auth()->user()->name;
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
        // ini masih belum tau kenapa auto sugestion tidak mengenalinya , nantik di handle aja
        $response_map =    GoogleMaps::load('geocoding')
            ->setParam([
                'address' => 'Monas, Jakarta'
            ])
            ->get();

        return view("user.peta-lokasi");
    }
}
