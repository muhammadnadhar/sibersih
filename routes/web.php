<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




// BASE PAGE , di sinni halaman  yang tidak terpengaruh middleware
route::get("/", [BaseController::class, "index"])->name("index");

/// Admin Page

// USER HALAMAN | middleware halaman login Langsung di Route nya jangan di group
route::prefix("user")->group(function () {
    route::get("/", [UserController::class, "Dashboard"])->name("user.dashboard");
    route::get("/sign-in", [UserController::class, "SignInViews"])->name("user.sign-in");
    route::post("/sign-in", [UserController::class, "SignInPost"])->name("user.sign-in.post");
    route::get("/sign-up", [UserController::class, "SignUpViews"])->name("user.sign-up");
});
