<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = [
            ['naam' => 'Margherita', 'prijs' => 5.00, 'image_path' => 'images/pizzas/margherita.png'],
            ['naam' => 'Pepperoni', 'prijs' => 6.00, 'image_path' => 'images/pizzas/pepperoni.png'],
            ['naam' => 'Funghi', 'prijs' => 6.00, 'image_path' => 'images/pizzas/funghi.png'],
            ['naam' => 'Salami', 'prijs' => 6.00, 'image_path' => 'images/pizzas/salami.png'],
            ['naam' => 'Hawaii', 'prijs' => 7.00, 'image_path' => 'images/pizzas/hawaii.png'],

        ];

        foreach ($pizzas as $pizza) {
            Pizza::create($pizza);
        } 
    }
}
