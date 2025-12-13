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
        $admin_id = Auth::guard("admin")->user()->id;
        // ambil user id yang login saat ini
        $admin = Admin::with('users')->find($admin_id);
        // Pagination user milik admin
        $users = $admin->users()->paginate(5);

        // dapatkan jenis laporan ( untuk laporan user | sia pa admin | petugas)
        $laporan  = Laporan::with(['user', 'admin', 'petugas'])->latest()->get();

        $petugas = Admin::with("petugas")->find(id: $admin_id)->latest()->get();


        return view("admin.dashboard", compact("users", "admin", "laporan", 'petugas'));
    }
    public function profile()
    {
        $admin = auth()->guard("admin")->user();
        return view("admin.profile", compact("admin"));
    }


    public function laporanId(Request $request)
    {
        $id = $request->query("id");
        // ambil data petugas dan user{
        $laporan_id  = Laporan::with(["user", "petugas"])->findOrFail(id: $id); // jika gagal 404

        return view("admin.laporan-id", ['laporan_id' => $laporan_id]);
    }


    public function signInView()
    {
        return View("admin.sign-in");
    }

    public function signInPost(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'password' => 'required'
        ]);

        $cridentia = $request->only("username", "password");
        if (Auth::guard("admin")->attempt($cridentia)) {
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
        $validated = $request->validate([
            'username' => 'required|min:3|max:30|unique:users,username',
            'email'    => 'required|email|unique:petugas,email',
            'password' => 'required|min:6',
        ]);

        /* if ($validated->p->fails()) { */
        /*     // Tangani error validasi di sini */
        /*     return redirect()->back()->withErrors($validator)->withInput(); */
        /* } */

        // jika admin sudah lagin
        if (auth()->guard("admin")->check()) {
            return redirect()->route("admin.dashboard")->with("success", "kamu sudah login admin");
        }

        // simpan ke database
        Admin::create([
            "username" =>  $validated["username"],
            // password simpan dalam bentuk hash
            "password" => Hash::make($validated["password"]),
            "invite_code" => $validated['invide_code'],
            "email" => $validated["email"],
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
