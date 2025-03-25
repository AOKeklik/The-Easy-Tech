<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

/* ********** ADMIN *********** */

Route::prefix("admin")->middleware("admin.redirect")->group(function(){

    /* signin */
    Route::get("signin", [AdminAuthController::class, "view_signin"])->name("admin.view.signin");
    Route::post("signin/submit", [AdminAuthController::class, "submit_signin"])->name("admin.submit.signin");

    /* forget */
    Route::get("forget", [AdminAuthController::class, "view_forget"])->name("admin.view.forget");
    Route::post("forget/submit", [AdminAuthController::class, "submit_forget"])->name("admin.submit.forget");

    /* reset */
    Route::get("reset",[AdminAuthController::class,"view_reset"])->name("admin.view.reset");
    Route::post("reset/submit",[AdminAuthController::class,"submit_reset"])->name("admin.submit.reset");
});

Route::post("admin/signout/submit", [AdminAuthController::class,"submit_signout"])->name("admin.submit.signout");

Route::prefix("admin")->middleware("admin.authenticate")->group(function () {
    /* dashboard */
    Route::get("", [AdminController::class, "index"])->name("admin.view");


    /* profile */
    Route::get("/profile", [AdminProfileController::class, "index"])->name("admin.profile.view");
});


/* ********** FRONTEND *********** */

Route::get('/csrf-token-refresh', function () {
    return response()->json(['token' => csrf_token()]);
})->name('csrf.token.refresh');