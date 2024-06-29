<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display the masseurs homepage
     */
    public function indexHomepage() {
        return view('home');
    }



}
