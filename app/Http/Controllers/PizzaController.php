<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Pizza_Ingredient;


class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::with('ingredienten')->get();
        return view('medewerker.pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredienten = Ingredient::all();
        return view('medewerker.pizzas.create', compact('ingredienten'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Calculate the total price based on the selected ingredients
        $ingredienten = $request->ingredienten ?? [];
        $prijs = 0;
    
        foreach ($ingredienten as $ingredient) {
            $prijs += Ingredient::findOrFail($ingredient)->prijs; // Use findOrFail for error handling
        }
    
        // Handle the image upload
        $imgPath = null;
        if ($request->hasFile('afbeelding') && $request->file('afbeelding')->isValid()) {
            $path = $request->file('afbeelding')->store('images/pizzas', 'public');
            $imgPath = 'storage/' . $path;
        }
    
        // Create a new pizza instance and save it
        $pizza = Pizza::create([
            'naam' => $request->name,
            'prijs' => $prijs,
            'image_path' => $imgPath,
        ]);

        $pizza->ingredienten()->attach($ingredienten);
    
        // Redirect to the pizzas index page
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
        $ingredienten = Ingredient::all();
        $pizzaIngredienten = $pizza->ingredienten->pluck('id')->toArray();
        return view('medewerker.pizzas.edit', compact('pizza', 'ingredienten', 'pizzaIngredienten'));
    }
    # code...
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        $ingredienten = $request->ingredienten ?? [];
        $prijs = 0;
    
        foreach ($ingredienten as $ingredient) {
            $prijs += Ingredient::findOrFail($ingredient)->prijs; // Use findOrFail for error handling
        }

        $imgPath = $pizza->image_path;
        if ($request->hasFile('afbeelding') && $request->file('afbeelding')->isValid()) {
            $path = $request->file('afbeelding')->store('images/pizzas', 'public');
            $imgPath = 'storage/' . $path;
            if (file_exists(public_path($pizza->image_path))) {
                unlink(public_path($pizza->image_path));
            }
        }
        $pizza->naam = $request->name;
        $pizza->prijs = $prijs;
        $pizza->image_path = $imgPath;
        $pizza->ingredienten()->sync($ingredienten);

        $pizza->save();

        return redirect()->route('pizzas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        $image_path = $pizza->image_path;
        if (file_exists(public_path($image_path))) {
            unlink(public_path($image_path));
        }
        $pizza->delete();
        return redirect()->route('pizzas.index');
    }
}
