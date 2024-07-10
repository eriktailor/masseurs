<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasseurDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;


// Login
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// Masseurs
Route::controller(MasseurDetailsController::class)->group(function() {
    Route::get('/', 'indexListing')->name('homepage');
    Route::get('/masseurs/fetch/{id}', 'getMasseurDetails');
    Route::post('/masseurs/store', 'storeMasseurDetails')->name('masseur.store');
    Route::get('/masseurs/sort', 'sortMasseurs')->name('masseurs.sort');
});

// Protected
Route::middleware('auth')->group(function() {
    Route::get('/', [MasseurDetailsController::class, 'indexListing'])->name('homepage');
});



// Mail test
Route::get('/send-expire-notifications', [MailController::class, 'sendExpireNotifications']);