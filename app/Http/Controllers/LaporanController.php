<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

        // Simpan ke database
        Laporan::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file'      => $namaFile,
            'user_id'   => auth()->id(), // jika user sudha  login 
            'lokasi'    => $request->lokasi, // jika ada
            'tanggal_laporan' => now(),      // opsional
            'status'    => 'pending',        // default
        ]);


        // Redirect atau response JSON
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
