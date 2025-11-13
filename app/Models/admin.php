<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    /*
    * admin punya hubungan ke petugas
    */
    public function Petugas(){
        return $this->hasMany(Laporan::class);
    }
    /*
    * admin punya hubungan ke user
    */
    public function User(){
        return $this->hasMany(User::class);
    }
}
