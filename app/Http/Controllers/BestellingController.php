<?php

namespace App\Http\Controllers;

use App\Enums\BestelMethode;
use App\Models\Bestelling;
use App\Models\Bestelregel;
use App\Models\Pizza;
use App\Models\Afmeting;
use Illuminate\Http\Request;
use App\Models\Klant;
use App\Enums\BestelStatus;

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
        $pizzas = Pizza::all();
        $pizzaAfmetingen = Afmeting::all();
        $bezorgKosten = 0;
        if(session()->has('bezorgKosten')){
            $bezorgKosten = session()->get('bezorgKosten');
        }
        return view('klant.bestellen', compact('bezorgKosten', 'pizzas', 'pizzaAfmetingen'));
    }
    public function afrekenen(Request $request)
    {
  
        $bestellingregels = json_decode($request->input('bestellingregel', []), true);

        $totaalPrijs = $request->input('totaalPrijs');
        $bezorgKosten = $request->input('bezorgKosten');
        $bestelMethode = $request->input('bestelMethode');
        return view('klant.afrekenen', compact('bestellingregels', 'totaalPrijs', 'bezorgKosten', 'bestelMethode'));
    }
    public function bestelmethode()
    {
        return view('klant.bestelMethode');
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
        $totaalPrijs = $request->totaalPrijs;
        if (auth()->user() == null) {
            $klant = Klant::firstOrCreate(
                ['emailadres' => $request->email],
                [
                    'naam' => $request->naam,
                    'adres' => $request->adres,
                    'woonplaats' => $request->woonplaats,
                    'telefoonnummer' => $request->telefoonnummer,
                ]
            );
            $klantId = $klant->id;
        } else {
            $klantId = Klant::where('emailadres', auth()->user()->email)->first()->id;
        }

        $bestelMethode = BestelMethode::tryFrom($request->bestelMethode);
        if (!$bestelMethode) {
            $bestelMethode = BestelMethode::afhalen;
        }

        $bestelling = Bestelling::create([
            'klant_id' => $klantId,
            'totaalPrijs' => $totaalPrijs,
            'datum' => now(),
            'status' => BestelStatus::Betaald,
            'bestelMethode' => $bestelMethode,
        ]);
        $bestellingregels = json_decode($request->input('bestellingregels'), true);
        foreach ($bestellingregels as $bestellingregel) {
            $pizza = Pizza::where('naam', $bestellingregel['naam'])->first();
            $afmeting = Afmeting::where('grootte', $bestellingregel['grootte'])->first();
            $pizzaId = $pizza->id;
            $afmetingId = $afmeting->id;
            $aantal = $bestellingregel['aantal'];
            $prijs = $bestellingregel['prijs'];

            $bestelregel = Bestelregel::create([
                'bestelling_id' => $bestelling->id,
                'pizza_id' => $pizzaId,
                'afmetingen_id' => $afmetingId,
                'aantal' => $aantal,
                'regelprijs' => $prijs,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return view('klant.bestellingStatus', compact('bestelling'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Bestelling $bestelling)
    {
        return view('klant.bestellingStatus', compact('bestelling'));
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
