<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //halaman utama
    public function petugas(){
        return view("petugas.petugas");
    }
}
