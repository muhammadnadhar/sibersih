<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

// BASE HALAMAN 
route::get("/",[BaseController::class,"Dashboard"])->name("base.dashboard");
