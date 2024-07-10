<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Salon;
use App\Models\Masseur;
use App\Models\MasseurDetails;
use Illuminate\Http\Request;

class MasseurDetailsController extends Controller
{
    /**
     * Display the masseurs homepage
     */
    public function indexListing() 
    {
        $masseurs = Masseur::with(['details', 'salon'])->orderBy('deleted')->get();
        $salons = Salon::all();
        $users = DB::table('users')->where('role', 'admin')->get();
        
        $data = [
            'masseurs' => $masseurs,
            'salons' => $salons,
            'users' => $users
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
        $searchQuery = $request->input('searchQuery', '');

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

        if (!empty($searchQuery)) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('full_name', 'like', '%' . $searchQuery . '%')
                ->orWhere('name', 'like', '%' . $searchQuery . '%');
            });
        }

        if (empty($sortBy)) {
            $masseurs = $query->orderBy('deleted')->get();
        } else {
            if ($sortBy == 'full_name') {
                $masseurs = $query
                    ->orderByRaw("CASE WHEN full_name IS NULL THEN 1 ELSE 0 END, full_name ASC")
                    ->get();
            } elseif ($sortBy == 'visa_expire' || $sortBy == 'passport_expire') {
                $masseurs = $query
                    ->leftJoin('masseur_details', 'masseurs.id', '=', 'masseur_details.masseur_id')
                    ->orderByRaw("CASE WHEN masseur_details.$sortBy IS NULL THEN 1 ELSE 0 END, masseur_details.$sortBy ASC")
                    ->get(['masseurs.*']); // Add select to avoid column conflict
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
