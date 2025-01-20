<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use Illuminate\Http\Request;

class BestellingController extends Controller
{
    public function showBestelMethode()
    {
        return view('klant.bestelMethode');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Bestelling::all();
        return view('bestellingen.index', compact('bestellingen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bestellingen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bestelling::create($request->all());
        return redirect()->route('bestellingen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bestelling $bestelling)
    {
        return view('bestellingen.show', compact('bestelling'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bestelling $bestelling)
    {
        return view('bestellingen.edit', compact('bestelling'));
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

        return redirect()->route('bestellingen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bestelling $bestelling)
    {
        $bestelling->delete();
    }
}
