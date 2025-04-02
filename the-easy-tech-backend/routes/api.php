<?php

use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("")/* ->middleware("") */->group(function () {
    Route::controller(FrontendController::class)->group(function(){
        /* setting */
        Route::get("setting","setting_get");
        
        /* section - slider */
        Route::get("slider/all","slider_all_get");

        /* section - service */
        Route::get("service/all","service_all_get");
        Route::get("service/{id}/{slug}","service_get");

        /* section - gatewayone */
        Route::get("gatewayone","gatewayone_get");

        /* section - gatewaytwo */
        Route::get("gatewaytwo","gatewaytwo_get");

        /* section - testimonial */
        Route::get("testimonial/all","testimonial_all_get");
        
        /* page - blog */
        Route::get("blog/all","blog_all_get");
        Route::get("blog/{id}/{slug}","blog_get");
    });
});