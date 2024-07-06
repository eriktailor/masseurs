<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\Masseur;
use App\Models\MasseurDetails;
use Illuminate\Http\Request;

class MasseurController extends Controller
{
    /**
     * Display the masseurs homepage
     */
    public function indexListing() 
    {
        $masseurs = Masseur::with(['details', 'salon'])->orderBy('deleted')->get();
        $salons = Salon::all();
        
        $data = [
            'masseurs' => $masseurs,
            'salons' => $salons
        ];

        return view('index', $data);
    }
    
    /**
     * Get a masseur details
     */
    public function getMasseurDetails($id)
    {
        $masseur = Masseur::with('details')->find($id);
        
        return response()->json($masseur);
    }

    /**
     * Store masseur details
     */
    public function storeMasseurDetails(Request $request)
    {
        // Check if the masseur exists
        $masseur = Masseur::where('name', $request->name)->first();

        if ($masseur) {
            // If masseur exists, update the details
            $masseurDetails = MasseurDetails::updateOrCreate(
                ['masseur_id' => $masseur->id],
                $request->except('name') // Exclude 'name' from the update
            );
        } else {
            // If masseur does not exist, create a new masseur and details
            $masseur = Masseur::create(['name' => $request->name]);
            $masseurDetails = MasseurDetails::create(array_merge(
                ['masseur_id' => $masseur->id],
                $request->except('name') // Exclude 'name' from the creation
            ));
        }

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Masszőr sikeresen módosítva!');
    }

    /**
     * Order masseurs listing with select field
     */
    public function sortMasseurs($sortBy = '')
    {
        if (empty($sortBy)) {
            // Default sorting logic, similar to indexListing
            $masseurs = Masseur::with(['details', 'salon'])->orderBy('deleted')->get();
        } else {
            if ($sortBy == 'full_name') {
                $masseurs = Masseur::with(['details', 'salon'])
                    ->orderByRaw("CASE WHEN full_name IS NULL THEN 1 ELSE 0 END, full_name ASC")
                    ->get();
            } else {
                $masseurs = Masseur::with(['details', 'salon'])->orderBy($sortBy)->get();
            }
        }

        $salons = Salon::all();
        
        $data = [
            'masseurs' => $masseurs,
            'salons' => $salons
        ];

        return view('list', $data);
    }
}
