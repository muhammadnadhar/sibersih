<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // index
    public function Admin()
    {
        // ambil user id yang login saat ini 
        $admin = Admin::with('users')->find(Auth::guard('admin')->id());

        // Pagination user milik admin
        $users = $admin->users()->paginate(5);
        return view("admin.admin", compact("users", "admin"));
    }
}
