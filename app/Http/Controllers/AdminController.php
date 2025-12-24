<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // index
    public function dashboard()
    {

        // Ambil admin yang sedang login
        $admin = Auth::guard("admins")->user();


        //----------USERS


        // Query dasar untuk user dengan invite_code admin
        $users_query = User::where("invite_code", $admin->invite_code)
            ->withCount('laporan'); // langsung hitung total laporan per user

        // Pagination 5 per halaman (otomatis query ke DB)
        $user_paginate = (clone $users_query)->paginate(5);

        // Ambil semua user terbaru (hanya jika perlu di page lain)
        $users = (clone $users_query)->latest()->get();

        // Ambil total laporan per user sebagai array [int, int, ...]
        $user_laporan_totals = $users_query->pluck('laporan_count')->toArray();


        //----------PETUGAS


        // Query dasar untuk petugas dengan invite_code admin
        $petugas_query = Petugas::where("invite_code", $admin->invite_code)
            ->withCount(['laporan as laporan_totals_selesai' => function ($query) {
                $query->where('status', 'selesai');
            }]);

        // Pagination 5 per halaman
        $petugas_paginate = (clone $petugas_query)->paginate(5);
        $petugas = (clone $petugas_query)->latest()->get();

        // Ambil total laporan selesai per petugas sebagai array
        $petugas_laporan_totals_success = $petugas_query
            ->pluck('laporan_totals_selesai')
            ->toArray();


        //----------LAPORAN


        // Query laporan terbaru beserta relasinya
        $laporan_query = Laporan::with(['admin', 'petugas', 'user']);
        $laporan = (clone $laporan_query)->latest()->get();

        // Hitung total laporan berdasarkan status
        $laporan_status_data = $laporan_query
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total')
            ->toArray();
        // contoh hasil: [2,3,5] → pending 2, ditugaskan 3, selesai 5

        return view("admin.dashboard", compact("users", "user_paginate", 'user_laporan_totals', "admin", "laporan", "laporan_status_data", 'petugas', 'petugas_paginate', 'petugas_laporan_totals_success'));
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
        return  redirect()->route("admin.sign-in")->with("info", "akun di buat , silahkan login ");
    }
    public function logout(Request $request)
    {

        $username = auth()->guard('admins')->user()->username;

        if (!$username || $username == null) {
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
    public function updatelaporan(Request $request)
    {

        $validate = validator::make($request->all(), [

            'petugas_id' => 'required|exists:petugas,id',
            'laporan_id' => 'required|exists:laporans,id',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with("error", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validate)->withInput();
        }
        // update laporan ke katagory di tugaskan dan tambahkan id petugas
        // $laporan = Laporan::where("admin_id", $admin_id)->first();

        $data = $validate->validated();
        $laporan = Laporan::find($data['laporan_id']);

        if ($laporan) {
            $laporan->status = "ditugaskan";
            $laporan->petugas_id = $data['petugas_id'];
            $laporan->nama_petugas = Petugas::find($data['petugas_id'])->username;
            $laporan->updated_at = now();
            $laporan->save();

            return redirect()->back()->with("success", "Laporan berhasil ditugaskan ke petugas.");
        } else {
            return redirect()->back()->with("error", "Laporan tidak ditemukan untuk admin ini.");
        }
    }
}
