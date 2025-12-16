<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Validator;
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
        $validated  = Validator::make($request->all() ,[
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string',
            'deskripsi'    => 'required|string',
            'image_laporan' => 'required|file|mimes:jpg,jpeg,png|max:5000',
        ]);

        if ($validated->fails()){
            return redirect()->back()->with("warning", "Validasi gagal. Silahkan periksa kembali input Anda.")->withErrors($validated)->withInput();
        }

        // Upload file
        $image = $request->file('image_laporan');
        $namaImage = time() . '_' . $image->getClientOriginalName();

        // Simpan file ke storage/app/public/laporan
        $image->storeAs('laporan', $namaImage, 'public');

        $user = auth()->user();

        $data = $validated->validate();
        // admin antara siapa yang menerima tugasnya
        Laporan::create([
            'judul'     => $data["judul"],
            'kategori'  => $data['kategori'],
            'deskripsi' => $data['deskripsi'],
            'image_path'      => $namaImage,
            "nama_pelapor" => $user->name,
            'admin_id' => $user->admin_id, // admin yang menegola user ambil berdasarkan id dari data user yg login
             'user_id'   => $user->id,
            'lokasi'    => $data['lokasi'], // jika ada
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
