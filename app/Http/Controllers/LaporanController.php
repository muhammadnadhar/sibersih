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
        $validated  = Validator::make($request->all(), [
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string',
            'deskripsi'    => 'required|string',
            'lokasi' => 'required|string|max:255',
            'image_laporan' => 'required|file|mimes:jpg,jpeg,png|max:5000',
        ]);

        if ($validated->fails()) {
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
            'image_laporan'      => $namaImage,
            "nama_pelapor" => $user->username,
            'admin_id' => $user->admin_id, // admin yang menegola user ambil berdasarkan id dari data user yg login
            'user_id'   => $user->id,
            'lokasi'    => $data['lokasi'], // jika ada
            'tanggal_laporan' => now(),
            'status'    => 'pending',        // default
        ]);

        // Redirect atau response JSON
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
    public function petugasLaporan(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|in:pending,diproses,ditugaskan,selesai',
            'image_laporan_selesai' => 'nullable|file|max:2048', // boleh null, tapi kalau ada harus valid
        ]);

        $petugas = auth()->guard("petugas")->user();

        // cari laporan berdasarkan id "laporan"
        $laporan = Laporan::findOrFail($id);

        // Jika ada file baru diupload
        if ($request->hasFile('image_laporan_selesai')) {

            //  Hapus file lama bila ada ( tidak di perluakn , )
            // if ($laporan->file && file_exists(public_path('uploads/laporan/' . $laporan->file))) {
            //     unlink(public_path('uploads/laporan/' . $laporan->file));
            // }

            // Upload file baru | yang di mana sampah sudah di bersihkan
            $file = $request->file('image_laporan_selesai');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            // $file->move(public_path('/storage/laporan-selesai'), $namaFile); // ini kurang konsisten
            $file->storeAs('laporan-selesai', $namaFile, 'public');

            // Simpan nama file baru ke database
            $laporan->image_laporan_selesai = $namaFile;
        }

        // Update status & petugas
        $laporan->status = $request->status;

        $laporan->save();

        return back()->with('success', 'Laporan berhasil diupdate.');
    }
}
