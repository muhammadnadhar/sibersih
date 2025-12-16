<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // index
    public function dashboard()
    {
        $admin_id = Auth::guard("admins")->user()->id;
        // Pagination user milik admin
        $users = Admin::with('users')->find($admin_id)->paginate(5);

        // dapatkan jenis laporan
        $laporan  = Laporan::with(['admin',"petugas","user"])->latest()->get();

        $petugas = Admin::with("petugas")->find(id: $admin_id)->latest()->get();

        return view("admin.dashboard", compact("users", "admin", "laporan", 'petugas'));
    }
    public function profile()
    {
        $admin = auth()->guard("admins")->user();
        return view("admin.profile", compact("admin"));
    }


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
        if (auth()->guard("admin")->check()) {
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
