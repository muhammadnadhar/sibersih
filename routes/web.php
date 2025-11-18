<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminLogin;
use App\Http\Middleware\PetugasLogin;
use App\Http\Middleware\UserLogin;
use Illuminate\Support\Facades\Route;


// BASE PAGE , di sinni halaman  yang tidak terpengaruh middleware
route::get("/", [BaseController::class, "index"])->name("index");


// USER HALAMAN | middleware halaman login Langsung di Route nya jangan di group
route::prefix("user")->group(function () {
    route::get("/", [UserController::class, "dashboard"])->name("user.dashboard")->middleware(UserLogin::class);
    route::get("/profile", [UserController::class, "profile"])->middleware(UserLogin::class)->name("user.profile");
    route::get("/sign-in", [UserController::class, "signInViews"])->name("user.sign-in");
    route::post("/sign-in", [UserController::class, "signInPost"])->name("user.sign-in.post");
    route::get("/sign-up", [UserController::class, "signUpViews"])->name("user.sign-up");
    route::post("/sign-up", [UserController::class, "signUpPost"])->name("user.sign-up.post");
});


/// PETUGAS Page
route::prefix("/petugas")->group(function () {
    route::get("/", [PetugasController::class, "dashboard"])->name("petugas.dashboard")->middleware(PetugasLogin::class);
    route::get("/profile", [PetugasController::class, "profile"])->name("petugas.profile")->middleware(PetugasLogin::class);
    route::get("/sign-in", [PetugasController::class, "signInViews"])->name("petugas.sign-in");
    route::post("/sign-in", [PetugasController::class, "signInPost"])->name("petugas.sign-in.post");
});
/// ADMIN Page
route::prefix("/admin")->group(function () {
    route::get("/", [AdminController::class, "dashboard"])->name("admin.dashboard")->middleware(AdminLogin::class);
    route::get("/profile", [AdminController::class, "profile"])->name("admin.profile")->middleware(AdminLogin::class);
    route::get("/sign-in", [AdminController::class, "signInView"])->name("admin.sign-in");
    route::post("/sign-in", [AdminController::class, "signInPost"])->name("admin.sign-in.post");
    route::get("/sign-up", [AdminController::class, "signUpView"])->name("admin.sign-up");
    route::post("/sign-up", [AdminController::class, "signUpPost"])->name("admin.sign-up.post");
});
