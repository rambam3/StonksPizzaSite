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
        $ingredienten = $request->ingredienten;
        $prijs = 0;
        foreach ($ingredienten as $ingredient) {
            $prijs += Ingredient::find($ingredient)->prijs;
        }

        $path = $request->file('afbeelding')->store('images/pizzas', 'public');
        $pathArray = explode('/', $path);
        $imgPath = 'storage/' . $pathArray[1] . '/' . $pathArray[2];

        Pizza::create([
            'naam' => $request->name,
            'prijs' => $prijs,
            'image_path' => $imgPath,
        ]);
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
    # code...
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
        $image_path = $pizza->image_path;
        if (file_exists(public_path($image_path))) {
            unlink(public_path($image_path));
        }
        $pizza->delete();
        return redirect()->route('pizzas.index');
    }
}
