<?php

namespace App\Http\Controllers;

use App\Models\Masseur;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display the masseurs homepage
     */
    public function indexHomepage() {
        $masseurs = Masseur::with('details')->get();
        
        return view('home', compact('masseurs'));
    }



}
