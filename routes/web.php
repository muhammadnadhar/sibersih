<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\LaporanController;
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
    Route::get('/sign-in', 'signInView')->name('user.sign-in');
    Route::post('/sign-in', 'signInPost')->name('user.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('user.sign-up');
    Route::post('/sign-up', 'signUpPost')->name('user.sign-up.post');

    Route::post('/logout', 'logout')->name('user.logout');

    Route::middleware(UserLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('user.dashboard');
        Route::get('/profile', 'profileView')->name('user.profile');
        Route::get("/profile-edit", "profileEditView")->name('user.profile.edit');
        Route::put("/prorfil-edit", 'profileEditPut')->name('user.profile.edit.put');
        Route::get("/map", "mapView")->name("user.map");
        Route::get("/history", "historyView")->name("user.history");
        Route::get("/laporan", 'laporanView')->name("user.laporan");
    });
});

/// PETUGAS Page
Route::prefix('petugas')->controller(PetugasController::class)->group(function () {
    Route::get('/sign-in', 'signInView')->name('petugas.sign-in');
    Route::post('/sign-in', 'signInPost')->name('petugas.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('petugas.sign-up');
    Route::post('/sign-up', 'signUpPost')->name('petugas.sign-up.post');

    Route::post('/logout', 'logout')->name('petugas.logout');

    Route::middleware(PetugasLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('petugas.dashboard');
        Route::get('history', 'historyView')->name('petugas.history');
        Route::get('/profile', 'profileView')->name('petugas.profile');
        Route::get("/profile-edit", "profileEditView")->name('petugas.profile.edit');
        Route::put("/prorfil-edit", 'profileEditPut')->name('petugas.profile.edit.put');
        Route::get("/laporan", 'laporanView')->name("petugas.laporan");
        Route::get("/map", "mapView")->name("petugas.map");
    });
});

/// ADMIN Page
Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/sign-in', 'signInView')->name('admin.sign-in');
    Route::post('/sign-in', 'signInPost')->name('admin.sign-in.post');
    Route::get('/sign-up', 'signUpView')->name('admin.sign-up');
    Route::post('/sign-up', action: 'signUpPost')->name('admin.sign-up.post');

    Route::post('/logout', 'logout')->name('admin.logout');

    Route::middleware(AdminLogin::class)->group(function () {
        Route::get('/', 'dashboard')->name('admin.dashboard');
        Route::get("/laporan-id", 'laporanId')->name("admin.laporan.id");
        Route::put("/update-laporan", 'updatelaporan')->name("admin.update.laporan");
        Route::get("/petugas-id", "petugasIdView")->name("admin.petugas.id");
        // Route::post("/petugas-id", "petugasIdPost")->name("admin.petugas.id.post");
        Route::get('/profile', 'profileView')->name('admin.profile');
        Route::get('/profile-edit', 'profileEditView')->name('admin.profile.edit');
        Route::put("/update-password", 'passwordUpdatePut')->name('admin.password.update');
    });
});


// LAPORAN  | Handle Data laporan
Route::prefix("/laporan")->controller(LaporanController::class)->group(function () {
    Route::post('/user', "userLaporan")->name("user.laporan.post");
    Route::put('/petugas/{id}', "petugasLaporan")->name("petugas.laporan.post"); // petugas update laporan nya
    Route::delete("/destroy/{id}", "destroy")->name("laporan.destroy");
});
