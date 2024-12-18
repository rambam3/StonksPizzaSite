<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
