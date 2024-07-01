<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasseurController;



Route::get('/', [IndexController::class, 'indexListing']);

Route::get('/masseurs/fetch/{id}', [MasseurController::class, 'getMasseurDetails']);
