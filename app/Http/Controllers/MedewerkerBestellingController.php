<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\Pizza;
use App\Models\Afmeting;
use Illuminate\Http\Request;

class MedewerkerBestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bestellingen = Bestelling::with('bestelregels.pizza')->get();
        return view('medewerker.bestelling', compact('bestellingen'));
    }

    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bestelling::create($request->all());
        return redirect()->route('bestelling.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bestelling $bestelling)
    {
        return view('bestelling.show', compact('bestelling'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bestelling $bestelling)
    {
        return view('bestelling.edit', compact('bestelling'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bestelling $bestelling)
    {
        $bestelling->klant_id = $request->klant_id;
        $bestelling->totaalprijs = $request->totaalprijs;
        $bestelling->datum = $request->datum;
        $bestelling->status = $request->status;
        $bestelling->save();

        return redirect()->route('bestelling.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bestelling $bestelling)
    {
        $bestelling->delete();
    }
}
