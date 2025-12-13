<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Api dari /views/user/laporan.blade.php
     * User kirim laporan , untuk di terima oleh admin dan petugas
     */
    public function userLaporan(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string',
            'deskripsi'    => 'required|string',
            'file_laporan' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5000',
        ]);
        // Upload file
        $file = $request->file('file_laporan');
        $namaFile = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke storage/app/public/laporan
        $file->storeAs('laporan', $namaFile, 'public');

        $user = auth()->user();

        // petugas_id di atur admin nantik , karena yang mengelola laporanya
        // admin antara siapa yang menerima tugasnya 
        Laporan::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file'      => $namaFile,
            "nama_pelapor" => $user->name,
            'admin_id' => $user->admin_id, // admin yang menegola user ambil berdasarkan id dari data user yg login
            'user_id'   => $user->id,
            'lokasi'    => $request->lokasi, // jika ada
            'tanggal_laporan' => now(),      // opsional
            'status'    => 'pending',        // default
        ]);

        // Redirect atau response JSON
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
    public function petugasLaporan(Request $request,  $id)
    {
        // Validasi request
        $request->validate([
            'status' => 'required|in:pending,diproses,ditugaskan,selesai',
            'file_laporan' => 'nullable|file|max:2048', // boleh null, tapi kalau ada harus valid
        ]);

        $petugas = auth()->guard("petugas")->user();

        // Ambil laporan
        $laporan = Laporan::findOrFail($id);

        // Jika ada file baru diupload
        if ($request->hasFile('file_laporan')) {

            // 1. Hapus file lama bila ada
            if ($laporan->file && file_exists(public_path('uploads/laporan/' . $laporan->file))) {
                unlink(public_path('uploads/laporan/' . $laporan->file));
            }

            // 2. Upload file baru
            $file = $request->file('file_laporan');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/laporan'), $namaFile);

            // 3. Update nama file di database
            $laporan->file = $namaFile;
        }

        // Update status & petugas
        $laporan->status = $request->status;
        $laporan->petugas_id = $petugas->id;

        $laporan->save();

        return back()->with('success', 'Laporan berhasil diupdate.');
    }
}
