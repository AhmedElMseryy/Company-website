<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
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
    });
    require __DIR__ . '/auth.php';
});
