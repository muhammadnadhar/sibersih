<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // index
    public function dashboard()
    {
        $admin = Auth::guard("admins")->user();

        // entah kenapa tidak di dapat users yang spesifik dengan relatioin
        /* $users = Admin::with('users')->where('invite_code',$admin->invite_code)->latest()->get(); */
        $users = User::where("invite_code", $admin->invite_code)->paginate(5); //dari table user langsung

        // dapatkan jenis laporan
        $laporan  = Laporan::with(['admin', "petugas", "user"])->latest()->get();

        // entah kenapa tidak di dapat users yang spesifik dengan relatioin
        /* $petugas = Admin::with("petugas")->where('invite_code',$admin->invite_code)->latest()->get(); */
        $petugas = Petugas::where("invite_code", $admin->invite_code)->paginate(5);

        return view("admin.dashboard", compact("users", "admin", "laporan", 'petugas'));
    }
    public function profileView()
    {
        $admin = auth()->guard("admins")->user();
        return view("admin.profile", compact("admin"));
    }
    public function profileEditView()
    {

        return view('admin.profile-edit');
    }
    public function passwordUpdatePut() {}


    public function laporanId(Request $request)
    {
        $id = $request->query("id");
        // ambil data petugas dan user{
        $laporan_id  = Laporan::with(["users", "petugas"])->findOrFail(id: $id); // jika gagal 404

        return view("admin.laporan-id", ['laporan_id' => $laporan_id]);
    }


    public function signInView()
    {
        return View("admin.sign-in");
    }

    public function signInPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:30',
            'password' => 'required|string|min:6'
        ]);

        $cridentias = $request->only("username", "password");
        if (Auth::guard("admins")->attempt($cridentias)) {
            $request->session()->regenerate(); // CEGAH session fixation
            return redirect()->route('admin.dashboard')->with("info", "welcome admin");
        }
        return back()->withErrors(['error' => 'Nama atau password salah.']);
    }
    public function signUpView()
    {
        return view("admin.sign-up");
    }
    public function signUpPost(Request $request)

    {
        $validated = validator::make($request->all(), [
            'username' => 'required|min:3|max:30',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'invite_code' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validated->fails()) {  // otomatis di tangani oleh Laravel
            // Tangani error validasi di sini */
            return redirect()->back()->with("warning", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validated)->withInput();
        }

        // jika admin sudah lagin
        if (auth()->guard("admins")->check()) {
            return redirect()->route("admin.dashboard")->with("success", "kamu sudah login admin");
        }

        $data = $validated->validated(); // ambil data yang sudah tervalidasi
        Admin::create([
            'username'    => $data['username'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
            'invite_code' => "SBR-" . $data['invite_code'],
        ]);
        // kami maunya admin harus validasi kembali jika memang sudha register
        return  redirect()->route("admin.sign-in")->with("info", "accoun di buat , silahkan login ");
    }
    public function logout(Request $request)
    {

        $username = auth()->guard('admins')->user()->name;
        if (!$username) {
            return redirect()->back()->with("warning", "kamu bukan admins ");
        }
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("index")->with('info', $username . " admin telah logout");
    }


    public function petugasIdView(Request $request)
    {
        $petugas_id = $request->query("id");
        // ambil data petugas dan user{
        /* $laporan_id  = ::with(["user", "petugas"])->findOrFail(id: $id); // jika gagal 404 */
        // ambil 1 data berdasarkan 1 data admin dan dapatkan 1 data
        $petugas = Admin::with("petugas")->find(auth()->guard("admin")->user()->id)->latest()->find(id: $petugas_id)->get();

        return view("admin.laporan-id", ['petugas_id' => $petugas]);
    }
    public function petugasIdPost(Request $request)
    {
        $admin_id = auth()->guard("admin")->user()->id;
        $petugas_id = $request->query("id");

        // update laporan ke katagory di tugaskan dan tambahkan id petugas
        $laporan = Laporan::where("admin_id", $admin_id)->first();

        if ($laporan) {

            $laporan->status = "ditugaskan";
            $laporan->petugas_id = $petugas_id;
            $laporan->updated_at = now();
            $laporan->save();

            return redirect()->back()->with("success", "Laporan berhasil ditugaskan ke petugas.");
        } else {
            return redirect()->back()->with("error", "Laporan tidak ditemukan untuk admin ini.");
        }
    }
}
