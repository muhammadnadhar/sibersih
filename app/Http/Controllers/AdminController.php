<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // index
    public function Admin(){
        return view("admin.admin");
    }
}
