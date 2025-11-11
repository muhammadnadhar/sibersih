<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Dashboard(){
        return view("user.dashboard");
    }

}
