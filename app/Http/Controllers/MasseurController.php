<?php

namespace App\Http\Controllers;

use App\Models\Masseur;
use App\Models\MasseurDetails;
use Illuminate\Http\Request;

class MasseurController extends Controller
{
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


}
