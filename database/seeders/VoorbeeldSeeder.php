<?php

namespace Database\Seeders;

use App\Models\Klant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoorbeeldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

                // Seed Klanten
                Klant::create( ['naam' => 'Jan Jansen', 'adres' => 'Straat 1', 'woonplaats' => 'Amsterdam', 'telefoonnummer' => '0612345678', 'emailadres' => 'jan@example.com']);
                Klant::create(['naam' => 'Piet Pietersen', 'adres' => 'Straat 2', 'woonplaats' => 'Rotterdam', 'telefoonnummer' => '0698765432', 'emailadres' => 'piet@example.com']);
                Klant::create(  ['naam' => 'Klaas Klaassen', 'adres' => 'Straat 3', 'woonplaats' => 'Utrecht', 'telefoonnummer' => '0687654321', 'emailadres' => 'klaas@example.com']);
        
        
    }
}
