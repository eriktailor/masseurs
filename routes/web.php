<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasseurController;



Route::get('/', [IndexController::class, 'indexListing']);

Route::controller(MasseurController::class)->group(function() {
    Route::get('/masseurs/fetch/{id}', 'getMasseurDetails');
    Route::post('/masseurs/store', 'storeMasseurDetails')->name('masseur.store');
});
