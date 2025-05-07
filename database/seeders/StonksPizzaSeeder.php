<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


use App\Models\Bestelling;
use App\Models\Klant;
use App\Enums\BestelStatus;
use Carbon\Carbon;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\Bestelregel;
use App\Models\Afmeting;
use App\Models\User;

class StonksPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Seed Afmetingen
        $afmetingen = [['id' => 1, "grootte" => "klein"],
        ['id' => 3, "grootte" => "groot"],
        ['id' => 2, "grootte" => "normaal"]
        ];
        foreach($afmetingen as $afmeting)
        {
            Afmeting::create($afmeting);
        }
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
            ['naam' => 'Uien', 'prijs' => 0.40],
            ['naam' => 'Basilicum', 'prijs' => 0.30],
            ['naam' => 'Spinazie', 'prijs' => 0.60],
            ['naam' => 'Ansjovis', 'prijs' => 1.00],
            ['naam' => 'Tonijn', 'prijs' => 1.20],
            ['naam' => 'Ham', 'prijs' => 1.00],
            ['naam' => 'Ananas', 'prijs' => 0.70],
            ['naam' => 'Parmezaan', 'prijs' => 0.80],
            ['naam' => 'Rucola', 'prijs' => 0.50],
            ['naam' => 'Pesto', 'prijs' => 0.90],
            ['naam' => 'Gorgonzola', 'prijs' => 1.10],
            ['naam' => 'Zongedroogde Tomaten', 'prijs' => 0.85],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }

        // Seed Pizzas
        $pizzas = [
            ['naam' => 'Margherita', 'prijs' => 5.00, 'image_path' => 'images/pizzas/margherita.png'],
            ['naam' => 'Pepperoni', 'prijs' => 6.00, 'image_path' => 'images/pizzas/pepperoni.png'],
            ['naam' => 'Funghi', 'prijs' => 6.00, 'image_path' => 'images/pizzas/funghi.png'],
            ['naam' => 'Salami', 'prijs' => 6.00, 'image_path' => 'images/pizzas/salami.jpg'],
            ['naam' => 'Hawaii', 'prijs' => 7.00, 'image_path' => 'images/pizzas/hawaii.jpg'],
            ['naam' => 'Mexican hot & spicy', 'prijs' => 8.00, 'image_path' => 'images/pizzas/Hot&Spicy.jpg'],
        ];

        foreach ($pizzas as $pizza) {
            Pizza::create($pizza);
        }

        $pizzaIngredients = [
            'Margherita' => ['Tomatensaus', 'Mozarella', 'Basilicum'],
            'Pepperoni' => ['Tomatensaus', 'Mozarella', 'Pepperoni', 'Basilicum'],
            'Funghi' => ['Tomatensaus', 'Mozarella', 'Champignons', 'Uien'],
            'Salami' => ['Tomatensaus', 'Mozarella', 'Pepperoni', 'Paprika'],
            'Hawaii' => ['Tomatensaus', 'Mozarella', 'Ham', 'Ananas'],
            'Mexican hot & spicy' => ['Tomatensaus', 'Mozarella', 'Pepperoni', 'Paprika', 'Champignons', 'Rucola'],
        ];

        foreach ($pizzaIngredients as $pizzaNaam => $ingredienten) {
            $pizza = Pizza::where('naam', $pizzaNaam)->first();
            
            if ($pizza) {
                $ingredientIds = Ingredient::whereIn('naam', $ingredienten)->pluck('id');
                $pizza->ingredienten()->attach($ingredientIds);
            }
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
        $counter = 0;

        foreach ($bestellingen as $bestelling) {
            foreach ($pizzas as $pizza) {
                $counter++;
                if ($counter > 10) {
                    break;
                }
                $aantal = rand(1, 5);
                Bestelregel::create([
                    'bestelling_id' => $bestelling->id,
                    'pizza_id' => $pizza->id,
                    'aantal' => $aantal,
                    'afmetingen_id' => random_int(1, 3),
                    'regelprijs' => $pizza->prijs * $aantal

                ]);
            }
        }

        //Seed Users
        user::create([
            'name' => 'Manager',
            'email' => 'Manager@stonkspizza.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Stonkspizzamanager123'),
            'rol' => 'manager'
        ]);

        user::create([
            'name' => 'medewerker',
            'email' => 'Medewerker@stonkspizza.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Stonkspizzamedewerker123'),
            'rol' => 'medewerker'
        ]);

    }
}
