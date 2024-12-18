<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bestelling;
use App\Models\Klant;
use App\Enums\BestelStatus;
use Carbon\Carbon;

class BestellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $klanten = Klant::all();

        foreach ($klanten as $klant) {
            Bestelling::create([
                'klant_id' => $klant->id,
                'datum' => Carbon::now(),
                'status' => BestelStatus::Initieel,
            ]);
        }
    }
}
