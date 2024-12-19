<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Klant::all();
        return view('klanten.index', compact('klanten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klanten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Klant::create($request->all());
        return redirect()->route('klanten.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klant $klant)
    {
        return view('klanten.show', compact('klant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klant $klant)
    {
        return view('klanten.edit', compact('klant'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klant $klant)
    {
        $klant->naam = $request->naam;
        $klant->adres = $request->adres;
        $klant->postcode = $request->postcode;
        $klant->woonplaats = $request->woonplaats;
        $klant->telefoonnummer = $request->telefoonnummer;
        $klant->email = $request->email;
        $klant->save();
        return redirect()->route('klanten.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klant $klant)
    {
        $klant->delete();
        return redirect()->route('klanten.index');
    }
}
