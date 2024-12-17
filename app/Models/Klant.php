<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $fillable = ['naam', 'adres', 'woonplaats', 'telefoonnummer', 'emailadres'];

    public function bestellingen()
    {
        return $this->hasMany(Bestelling::class);
    }

    public function bestelregels()
    {
        return $this->hasmany(Bestelregel::class);
    }

    public function totaalprijs()
    {
        return $this->bestelregels->sum(function ($regel) {
            return $regel->regelprijs();
        });
    }
}
