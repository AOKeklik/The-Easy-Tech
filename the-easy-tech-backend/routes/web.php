<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGatewayoneController;
use App\Http\Controllers\Admin\AdminGatewaytwoController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTestimonialController;
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

    /* contact */
    Route::controller(AdminContactController::class)->group(function() {
        Route::get("contact", "index")->name("admin.contact.view");
        Route::get("contact/table", "contact_table_view")->name("admin.contact.table.view");
        Route::get("contact/detail/{contact_id}", "contact_detail_view")->name("admin.contact.detail.view");
        Route::post("contact/delete", "contact_delete")->name("admin.contact.delete");
    });

    /* setting */
    Route::controller(AdminSettingController::class)->group(function() {
        Route::get("setting/edit", "setting_edit_view")->name("admin.setting.edit.view");
        Route::post("setting/general/update", "setting_general_update")->name("admin.setting.general.update");
        Route::post("setting/image/update", "setting_image_update")->name("admin.setting.image.update");
        Route::post("setting/link/update", "setting_link_update")->name("admin.setting.link.update");
    });

    /* category */
    Route::controller(AdminCategoryController::class)->group(function() {
        Route::get("category","index")->name("admin.category.view");
        Route::get("category/table", "category_table_view")->name("admin.category.table.view");
        Route::get("category/add", "category_add_view")->name("admin.category.add.view");
        Route::get("category/edit/{category_id}", "category_edit_view")->name("admin.category.edit.view");
        Route::post("category/store", "category_store")->name("admin.category.store");
        Route::post("category/update", "category_update")->name("admin.category.update");
        Route::post("category/status/update", "category_status_update")->name("admin.category.status.update");
        Route::post("category/delete", "category_delete")->name("admin.category.delete");
    });

    /* profile */
    Route::controller(AdminProfileController::class)->group(function(){
        Route::get("/profile","index")->name("admin.profile.view");
        Route::post("/profile/update", "profile_update")->name("admin.profile.update");
        Route::post("/profile/password/update", "profile_password_update")->name("admin.profile.password.update");
    });

    /* section - slider */
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

    /* section - service */
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

    /* section - gatewayone */
    Route::controller(AdminGatewayoneController::class)->group(function(){
        Route::get("gatewayone/edit","gatewayone_edit_view")->name("admin.gatewayone.edit.view");
        Route::post("gatewayone/update", "gatewayone_update")->name("admin.gatewayone.update");
    });

    /* section - gatewaytwo */
    Route::controller(AdminGatewaytwoController::class)->group(function(){
        Route::get("gatewaytwo/edit","gatewaytwo_edit_view")->name("admin.gatewaytwo.edit.view");
        Route::post("gatewaytwo/update", "gatewaytwo_update")->name("admin.gatewaytwo.update");
    });

    /* section - testimonial */
    Route::controller(AdminTestimonialController::class)->group(function(){
        Route::get("testimonial","index")->name("admin.testimonial.view");
        Route::get("testimonial/table", "testimonial_table_view")->name("admin.testimonial.table.view");
        Route::get("testimonial/add", "testimonial_add_view")->name("admin.testimonial.add.view");
        Route::get("testimonial/edit/{testimonial_id}", "testimonial_edit_view")->name("admin.testimonial.edit.view");
        Route::post("testimonial/store", "testimonial_store")->name("admin.testimonial.store");
        Route::post("testimonial/update", "testimonial_update")->name("admin.testimonial.update");
        Route::post("testimonial/status/update", "testimonial_status_update")->name("admin.testimonial.status.update");
        Route::post("testimonial/delete", "testimonial_delete")->name("admin.testimonial.delete");
    });

    /* page - blog */
    Route::controller(AdminBlogController::class)->group(function() {
        Route::get("blog","index")->name("admin.blog.view");
        Route::get("blog/table", "blog_table_view")->name("admin.blog.table.view");
        Route::get("blog/add","blog_add_view")->name("admin.blog.add.view");
        Route::get("blog/edit/{blog_id}","blog_edit_view")->name("admin.blog.edit.view");
        Route::post("blog/store","blog_store")->name("admin.blog.store");
        Route::post("blog/update","blog_update")->name("admin.blog.update");
        Route::post("blog/status/update","blog_status_update")->name("admin.blog.status.update");
        Route::post("blog/delete","blog_delete")->name("admin.blog.delete");
    });

    /* page - about */
    Route::controller(AdminAboutController::class)->group(function(){
        Route::get("about/edit","about_edit_view")->name("admin.about.edit.view");
        Route::post("about/update", "about_update")->name("admin.about.update");
    });
});


/* ********** FRONTEND *********** */

Route::get('/csrf-token-refresh', function () {
    return response()->json(['token' => csrf_token()]);
})->name('csrf.token.refresh');