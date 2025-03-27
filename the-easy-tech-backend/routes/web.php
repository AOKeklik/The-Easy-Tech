<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGatewayoneController;
use App\Http\Controllers\Admin\AdminGatewaytwoController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSliderController;
use Illuminate\Support\Facades\Route;

/* ********** ADMIN *********** */

Route::prefix("admin")->middleware("admin.redirect")->group(function(){

    Route::controller(AdminAuthController::class)->group(function(){
        /* signin */
        Route::get("signin", "signin_view")->name("admin.signin.view");
        Route::post("signin/submit", "signin_submit")->name("admin.signin.submit");

        /* forget */
        Route::get("forget", "forget_view")->name("admin.view.forget");
        Route::post("forget/submit", "forget_submit")->name("admin.forget.submit");

        /* reset */
        Route::get("reset", "reset_view")->name("admin.reset.view");
        Route::post("reset/submit", "reset_submit")->name("admin.reset.submit");
    });
});

Route::post("admin/signout/submit", [AdminAuthController::class,"signout_submit"])->name("admin.signout.submit");

Route::prefix("admin")->middleware("admin.authenticate")->group(function () {
    /* dashboard */
    Route::get("", [AdminController::class, "index"])->name("admin.view");

    /* profile */
    Route::controller(AdminProfileController::class)->group(function(){
        Route::get("/profile","index")->name("admin.profile.view");
        Route::post("/profile/update", "profile_update")->name("admin.profile.update");
        Route::post("/profile/password/update", "profile_password_update")->name("admin.profile.password.update");
    });

    /* slider */
    Route::controller(AdminSliderController::class)->group(function(){
        Route::get("slider","index")->name("admin.slider.view");
        Route::get("slider/table", "slider_table_view")->name("admin.slider.table.view");
        Route::get("slider/add", "slider_add_view")->name("admin.slider.add.view");
        Route::get("slider/edit/{slider_id}", "slider_edit_view")->name("admin.slider.edit.view");
        Route::post("slider/store", "slider_store")->name("admin.slider.store");
        Route::post("slider/update", "slider_update")->name("admin.slider.update");
        Route::post("slider/status/update", "slider_status_update")->name("admin.slider.status.update");
        Route::post("slider/delete", "slider_delete")->name("admin.slider.delete");
    });

    /* service */
    Route::controller(AdminServiceController::class)->group(function(){
        Route::get("service","index")->name("admin.service.view");
        Route::get("service/table", "service_table_view")->name("admin.service.table.view");
        Route::get("service/add", "service_add_view")->name("admin.service.add.view");
        Route::get("service/edit/{service_id}", "service_edit_view")->name("admin.service.edit.view");
        Route::post("service/store", "service_store")->name("admin.service.store");
        Route::post("service/update", "service_update")->name("admin.service.update");
        Route::post("service/status/update", "service_status_update")->name("admin.service.status.update");
        Route::post("service/delete", "service_delete")->name("admin.service.delete");
    });

    /* gatewayone */
    Route::controller(AdminGatewayoneController::class)->group(function(){
        Route::get("gatewayone/edit","gatewayone_edit_view")->name("admin.gatewayone.edit.view");
        Route::post("gatewayone/update", "gatewayone_update")->name("admin.gatewayone.update");
        Route::post("gatewayone/status/update", "gatewayone_status_update")->name("admin.gatewayone.status.update");
    });

    /* gatewaytwo */
    Route::controller(AdminGatewaytwoController::class)->group(function(){
        Route::get("gatewaytwo/edit","gatewaytwo_edit_view")->name("admin.gatewaytwo.edit.view");
        Route::post("gatewaytwo/update", "gatewaytwo_update")->name("admin.gatewaytwo.update");
        Route::post("gatewaytwo/status/update", "gatewaytwo_status_update")->name("admin.gatewaytwo.status.update");
    });
});


/* ********** FRONTEND *********** */

Route::get('/csrf-token-refresh', function () {
    return response()->json(['token' => csrf_token()]);
})->name('csrf.token.refresh');