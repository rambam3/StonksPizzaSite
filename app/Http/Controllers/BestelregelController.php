<?php

namespace App\Http\Controllers;

use App\Models\Bestelregel;
use Illuminate\Http\Request;

class BestelregelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Bestelregel::all();
        return view('bestelregels.index', compact('bestelregels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bestelregels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bestelregel::create($request->all());
        return redirect()->route('bestelregels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bestelregel $bestelregel)
    {
        return view('bestelregels.show', compact('bestelregel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bestelregel $bestelregel)
    {
        return view('bestelregels.edit', compact('bestelregel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bestelregel $bestelregel)
    {
        $bestelregel->bestelling_id = $request->bestelling_id;
        $bestelregel->pizza_id = $request->pizza_id;
        $bestelregel->aantal = $request->aantal;
        $bestelregel->prijs = $request->prijs;
        $bestelregel->save();

        return redirect()->route('bestelregels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bestelregel $bestelregel)
    {
        // dd($bestelregel);
        $bestelregel->delete();
        return redirect()->route('bestelling.index');
    }
}
