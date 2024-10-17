<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimonialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

##----------------------------------- FRONT ROUTES
Route::name('front.')->group(function () {
    Route::view('/', 'front.index')->name('index');
    Route::view('/about', 'front.about')->name('about');
    Route::view('/service', 'front.service')->name('service');
    Route::view('/contact', 'front.contact')->name('contact');
});


##----------------------------------- ADMIN ROUTES
Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')->middleware(
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'
)->group(function () {

    Route::middleware('auth')->group(function () {
        //============================== HOME PAGE
        Route::view('', 'admin.index')->name('index');

        //============================== SERVICES
        Route::controller(ServiceController::class)->group(function () {
            Route::resource('services', ServiceController::class);
        });
        //============================== FEATURES
        Route::controller(FeatureController::class)->group(function () {
            Route::resource('features', FeatureController::class);
        });
        //============================== MESSAGES
        Route::controller(MessageController::class)->group(function () {
            Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
        });
        //============================== SUBSCRIBERS
        Route::controller(SubscriberController::class)->group(function () {
            Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
        });
        //============================== TESTIMONIALS
        Route::controller(TestimonialController::class)->group(function () {
            Route::resource('testimonials', TestimonialController::class);
        });
        //============================== COMPANIES
        Route::controller(CompanyController::class)->group(function () {
            Route::resource('companies', CompanyController::class);
        });
        //============================== MEMBERS
        Route::controller(MemberController::class)->group(function () {
            Route::resource('members', MemberController::class);
        });
        //============================== SETTINGS
        Route::controller(SettingController::class)->group(function () {
            Route::resource('settings', SettingController::class)->only(['index', 'update']);
        });
    });
    require __DIR__ . '/auth.php';
});
