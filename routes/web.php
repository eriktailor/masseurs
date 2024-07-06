<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasseurDetailsController;




Route::controller(MasseurDetailsController::class)->group(function() {
    Route::get('/', 'indexListing');
    Route::get('/masseurs/fetch/{id}', 'getMasseurDetails');
    Route::post('/masseurs/store', 'storeMasseurDetails')->name('masseur.store');
    Route::get('/masseurs/sort', 'sortMasseurs')->name('masseurs.sort');
});
