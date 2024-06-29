<?php

use DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/masseur-details', function () {
    $masseurs = DB::table('masseurs')->get();
    dd($masseurs);
});
