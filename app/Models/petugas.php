<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class petugas extends Model
{
    use HasFactory;

    /*
    * terhubung ke admin
    */
    public function Admin(){
        return $this->belongsTo(Admin::class);
    }
}
