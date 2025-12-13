<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/* use Illuminate\Database\Eloquent\Model; */
/* class Petugas extends Model */
// di ganti , karena model membutuhkan  getAuthIdentifier() , getAuthPassword() , remember token , AuthenticatableTrait , ability untuk dipakai Auth::attempt()
class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "Petugas";


    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    /*
    * terhubung ke admin
    */
    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
