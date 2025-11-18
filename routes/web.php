<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PetugasLogin;
use App\Http\Middleware\UserLogin;
use Illuminate\Support\Facades\Route;


// BASE PAGE , di sinni halaman  yang tidak terpengaruh middleware
route::get("/", [BaseController::class, "index"])->name("index");

/// PETUGAS Page
route::prefix("/petugas")->group(function () {
    route::get("/", [PetugasController::class, "dashboard"])->name("petugas.dashboard")->middleware(PetugasLogin::class);
    route::get("/profile", [PetugasController::class, "profile"])->name("petugas.profile")->middleware(PetugasLogin::class);
    route::get("/sign-in", [PetugasController::class, "signInViews"])->name("petugas.sign-in");
    route::post("/sign-in", [PetugasController::class, "signInPost"])->name("petugas.sign-in.post");
});
/// ADMIN Page

// USER HALAMAN | middleware halaman login Langsung di Route nya jangan di group
route::prefix("user")->group(function () {
    route::get("/", [UserController::class, "dashboard"])->name("user.dashboard")->middleware(UserLogin::class);
    route::get("/profile", [UserController::class, "profile"])->middleware(UserLogin::class)->name("user.profile");
    route::get("/sign-in", [UserController::class, "signInViews"])->name("user.sign-in");
    route::post("/sign-in", [UserController::class, "signInPost"])->name("user.sign-in.post");
    route::get("/sign-up", [UserController::class, "signUpViews"])->name("user.sign-up");
});
