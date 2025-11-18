<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
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
        Laporan::created([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file'      => $namaFile,
            'user_id'   => auth()->id(),  // jika user login
        ]);

        // Redirect atau response JSON
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
