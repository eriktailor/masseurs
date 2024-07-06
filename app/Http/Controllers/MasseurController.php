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
     * Order masseurs listing with select fields
     */
    public function sortMasseurs(Request $request)
    {
        $sortBy = $request->input('sortBy', '');
        $salonId = $request->input('salonId', '');
        $status = $request->input('status', '');

        $query = Masseur::with(['details', 'salon']);

        if (!empty($salonId)) {
            $query->whereHas('salon', function ($q) use ($salonId) {
                $q->where('id', $salonId);
            });
        }

        if (!empty($status)) {
            if ($status == 'active') {
                $query->where('deleted', 0);
            } elseif ($status == 'inactive') {
                $query->where('deleted', 1);
            }
        }

        if (empty($sortBy)) {
            $masseurs = $query->orderBy('deleted')->get();
        } else {
            if ($sortBy == 'full_name') {
                $masseurs = $query
                    ->orderByRaw("CASE WHEN full_name IS NULL THEN 1 ELSE 0 END, full_name ASC")
                    ->get();
            } else {
                $masseurs = $query->orderBy($sortBy)->get();
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
