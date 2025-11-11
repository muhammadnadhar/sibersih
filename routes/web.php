<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });
// BASE PAGE , di sinni halaman  yang tidak terpengaruh middleware
route::get("/",[BaseController::class,"index"])->name("index");

// USER HALAMAN
route::get("/user",[UserController::class,"Dashboard"])->name("user.dashboard");
