<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // index laporan
    public function laporan(){
        return view("laporan.laporan");
    }
}
