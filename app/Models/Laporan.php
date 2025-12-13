<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'user_id',
        'admin_id',
        'petugas_id',
        'judul',
        'kategori',
        'deskripsi',
        'file_path',
        'status',
        'lokasi',
        'tanggal_laporan',
    ];

    /**
     * Pelapor
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Admin yang menangani laporan
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Petugas yang ditugaskan
     */
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
