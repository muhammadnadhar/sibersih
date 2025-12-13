<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminLogin;
use App\Http\Middleware\PetugasLogin;
use App\Http\Middleware\UserLogin;
use App\Models\Laporan;
use Illuminate\Support\Facades\Route;


// BASE PAGE , di sinni halaman  yang tidak terpengaruh middleware
route::get("/", [BaseController::class, "index"])->name("index");
route::get("/block", [BaseController::class, "about"])->name("about");


// USER HALAMAN | middleware halaman login Langsung di Route nya jangan di group
/* route::prefix("user")->group(function () { */  // cara lama
/*     route::get("/", [UserController::class, "dashboard"])->name("user.dashboard")->middleware(UserLogin::class); */
/*     route::get("/profile", [UserController::class, "profile"])->middleware(UserLogin::class)->name("user.profile"); */
/*     route::get("/sign-in", [UserController::class, "signInViews"])->name("user.sign-in"); */
/*     route::post("/sign-in", [UserController::class, "signInPost"])->name("user.sign-in.post"); */
/*     route::get("/sign-up", [UserController::class, "signUpViews"])->name("user.sign-up"); */
/*     route::post("/sign-up", [UserController::class, "signUpPost"])->name("user.sign-up.post"); */
/* }); */
/**/
Route::prefix('user')->controller(UserController::class)->group(function () {

    Route::middleware(UserLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('user.dashboard');
        Route::get('/profile', 'profile')->name('user.profile');
        Route::get("/map", "mapView")->name("user.map");
        Route::get("/history", "historyView")->name("user.history");
        Route::get("/laporan", 'laporanView')->name("user.laporan");
    });

    Route::get('/sign-in', 'signInView')->name('user.sign-in');
    Route::post('/sign-in', 'signInPost')->name('user.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('user.sign-up');
    Route::post('/sign-up', 'signUpPost')->name('user.sign-up.post');
});

/// PETUGAS Page
Route::prefix('petugas')->controller(PetugasController::class)->group(function () {

    Route::middleware(PetugasLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('petugas.dashboard');
        Route::get('/profile', 'profile')->name('petugas.profile');
        Route::get("/laporan", 'laporanView')->name("petugas.laporan");
    });

    Route::get('/sign-in', 'signInView')->name('petugas.sign-in');
    Route::post('/sign-in', 'signInPost')->name('user.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('petugas.sign-up');
    Route::post('/sign-up', 'signUpPost')->name('petugas.sign-up.post');
});

/// ADMIN Page
Route::prefix('admin')->controller(AdminController::class)->group(function () {

    Route::middleware(AdminLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('admin.dashboard');
        Route::get("/laporan-id", 'laporanId')->name("admin.laporan.id");
        Route::get("/petugas-id", "petugasId")->name("admin.petugas.id");
        Route::post("/petugas-id", "petugasIdPost")->name("admin.petugas.id.post");
        Route::get('/profile', 'profile')->name('admin.profile');
    });

    Route::get('/sign-in', 'signInView')->name('admin.sign-in');
    Route::post('/sign-in', 'signInPost')->name('admin.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('admin.sign-up');
    Route::post('/sign-up', 'signUpPost')->name('admin.sign-up.post');
});


// LAPORAN  | Handle Data laporan
Route::prefix("/laporan")->controller(Laporan::class)->group(function () {
    Route::post('/user', "userLaporan")->name("user.laporan");
    Route::put('/user', "petugasLaporan")->name("petugas.laporan"); // petugas update laporan nya
});
