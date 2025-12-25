<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/* use Illuminate\Database\Eloquent\Model; */

/**
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @method \Illuminate\Database\Eloquent\Relations\HasMany users()
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'invite_code',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    /*
    * admin punya hubungan ke petugas
    */
    public function petugas()
    {
        return $this->hasMany(Petugas::class, "admin_id", "id");
    }
    /*
    * admin punya hubungan ke user
    */
    public function users()
    {
        return $this->hasMany(User::class, "admin_id", "id");
    }
    /*
    * admin punya hubungan ke setiap laporan yang di kelola nya
    */
    public function laporan()
    {
        return $this->hasMany(Laporan::class, "admin_id", "id");
    }
}
