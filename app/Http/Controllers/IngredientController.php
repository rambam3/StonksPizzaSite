<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredienten = Ingredient::all();
        return view('medewerker.ingredienten.index', compact('ingredienten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medewerker.ingredienten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'prijs' => 'required|numeric',
        ]);
        Ingredient::create([
            'naam' => $request->naam,
            'prijs' => $request->prijs,
        ]);
        return redirect()->route('ingredienten.index')->with('success', 'Ingredient successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('medewerker.ingredienten.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->naam = $request->naam;
        $ingredient->prijs = $request->prijs;
        $ingredient->save();

        return redirect()->route('ingredienten.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredienten.index');
    }
}
