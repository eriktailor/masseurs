<?php

namespace App\Http\Controllers;

use App\Models\Masseur;
use Illuminate\Http\Request;

class MasseurController extends Controller
{
    
    /**
     * Get a masseur details
     */
    public function getMasseurDetails($id)
    {
        $masseur = Masseur::find($id);
    
        return response()->json($masseur);
    }
}
