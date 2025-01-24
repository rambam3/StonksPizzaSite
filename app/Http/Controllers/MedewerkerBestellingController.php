<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\Pizza;
use App\Models\Afmeting;
use App\Models\Klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedewerkerBestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bestellingen = Bestelling::with('bestelregels.pizza')->get();
        return view('medewerker.bestelling.bestelling', compact('bestellingen'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bestelling::create($request->all());
        return redirect()->route('medewerker.bestelling.bestelling');
    }



    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Bestelling $bestelling)
    {
        $pizzaAfmetingen = DB::table('bestelregels')
            ->join('afmetingen', 'bestelregels.afmetingen_id', '=', 'afmetingen.id')
            ->join('pizzas', 'bestelregels.pizza_id', '=', 'pizzas.id')
            ->where('bestelregels.bestelling_id', $bestelling->id)
            ->select('bestelregels.id as bestelregel_id', 'bestelregels.aantal', 'afmetingen.id as afmeting_id', 'afmetingen.grootte', 'pizzas.naam as pizza_naam')
            ->get();

        $afmetingen = DB::table('afmetingen')->select('id', 'grootte')->get();
        $pizzas = Pizza::all();
        return view('medewerker.bestelling.edit', compact('bestelling', 'pizzaAfmetingen', 'afmetingen', 'pizzas',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bestelling $bestelling)
    {
        $bestelling->status = $request->status;
        $bestelling->save();
        return redirect()->route('bestelling.index', $bestelling->id)->with('success', 'Bestelling updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Find the bestelling
        $bestelling = Bestelling::find($request->bestelling_id);
    
        // If no bestelling is found, redirect with an error
        if (!$bestelling) {
            return redirect()->route('bestelling.index')->with('error', 'Bestelling niet gevonden.');
        }
    
        // Delete associated bestelregels
        $bestelling->bestelregels()->delete();
        $bestelling->klant()->delete(); 
    
        // Delete the bestelling itself
        $bestelling->delete();

        $request->session()->forget('bestelling_' . $bestelling->id);


        // Redirect with success message
        return redirect()->route('bestelling.index')->with('success', 'Bestelling succesvol verwijderd.');
    }
}
