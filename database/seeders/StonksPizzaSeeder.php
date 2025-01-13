<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bestelling;
use App\Models\Klant;
use App\BestelStatus;
use Carbon\Carbon;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\Bestelregel;

class StonksPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Klanten
        $klanten = [
            ['naam' => 'Jan Jansen', 'adres' => 'Straat 1', 'woonplaats' => 'Amsterdam', 'telefoonnummer' => '0612345678', 'emailadres' => 'jan@example.com'],
            ['naam' => 'Piet Pietersen', 'adres' => 'Straat 2', 'woonplaats' => 'Rotterdam', 'telefoonnummer' => '0698765432', 'emailadres' => 'piet@example.com'],
            ['naam' => 'Klaas Klaassen', 'adres' => 'Straat 3', 'woonplaats' => 'Utrecht', 'telefoonnummer' => '0687654321', 'emailadres' => 'klaas@example.com'],
        ];

        foreach ($klanten as $klant) {
            Klant::create($klant);
        }

        // Seed Ingredients
        $ingredients = [
            ['naam' => 'Tomatensaus', 'prijs' => 0.50],
            ['naam' => 'Mozarella', 'prijs' => 0.50],
            ['naam' => 'Pepperoni', 'prijs' => 1.50],
            ['naam' => 'Kip', 'prijs' => 1.00],
            ['naam' => 'Champignons', 'prijs' => 0.75],
            ['naam' => 'Paprika', 'prijs' => 0.75],
            ['naam' => 'Olijven', 'prijs' => 0.50],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }

        // Seed Pizzas
        $pizzas = [
            ['naam' => 'Margherita', 'prijs' => 5.00],
            ['naam' => 'Pepperoni', 'prijs' => 6.00],
            ['naam' => 'Hawaii', 'prijs' => 7.00],
            ['naam' => 'Shoarma', 'prijs' => 8.00],
            ['naam' => 'Vegetarisch', 'prijs' => 6.50],
            ['naam' => 'Quattro Stagioni', 'prijs' => 7.50],
            ['naam' => 'Quattro Formaggi', 'prijs' => 8.50],
            ['naam' => 'Calzone', 'prijs' => 7.50],
            ['naam' => 'Tonno', 'prijs' => 7.00],
            ['naam' => 'Pollo', 'prijs' => 7.50],
        ];

        foreach ($pizzas as $pizza) {
            Pizza::create($pizza);
        }

        // Seed Bestellingen
        $klanten = Klant::all();

        foreach ($klanten as $klant) {
            Bestelling::create([
                'klant_id' => $klant->id,
                'datum' => Carbon::now(),
                'status' => BestelStatus::Initieel,
            ]);
        }

        // Seed Bestelregels
        $bestellingen = Bestelling::all();
        $pizzas = Pizza::all();

        foreach ($bestellingen as $bestelling) {
            foreach ($pizzas as $pizza) {
                $aantal = rand(1, 5);
                Bestelregel::create([
                    'bestelling_id' => $bestelling->id,
                    'pizza_id' => $pizza->id,
                    'aantal' => $aantal,
                    'afmeting' => ['klein', 'normaal', 'groot'][array_rand(['klein', 'normaal', 'groot'])],
                    'regelprijs' => $pizza->prijs * $aantal

                ]);
            }
        }
    }
}
