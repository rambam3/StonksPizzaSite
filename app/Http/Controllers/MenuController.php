<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Afmeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::with('ingredienten')->get();
        return view('klant.menu', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('afbeelding')->store('images/pizzas', 'public');
        Pizza::create($request->all());
        return redirect()->route('pizzas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        return view('pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        return view('pizzas.edit', compact('pizza'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        $pizza->naam = $request->naam;
        $pizza->save();

        return redirect()->route('pizzas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizzas.index');
    }
}
