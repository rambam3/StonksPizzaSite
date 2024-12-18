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
    }
}
