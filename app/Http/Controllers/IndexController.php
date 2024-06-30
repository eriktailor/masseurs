<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\Masseur;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display the masseurs homepage
     */
    public function indexHomepage() {
        $masseurs = Masseur::with(['details', 'salon'])->get();
        $salons = Salon::all();
        
        $data = [
            'masseurs' => $masseurs,
            'salons' => $salons
        ];

        return view('home', $data);
    }



}
