<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BestelregelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bestellingen = Bestelling::all();
        $pizzas = Pizza::all();

        foreach ($bestellingen as $bestelling) {
            foreach ($pizzas as $pizza) {
                Bestelregel::create([
                    'bestelling_id' => $bestelling->id,
                    'pizza_id' => $pizza->id,
                    'aantal' => rand(1, 5),
                    'afmeting' => ['klein', 'normaal', 'groot'][array_rand(['klein', 'normaal', 'groot'])],
                    'regelprijs' => $basisprijs * $factor * $this->aantal
                ]);
            }
        }
    }
}
