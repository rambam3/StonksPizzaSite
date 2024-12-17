<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['naam'];

    public function ingredienten()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }

    public function prijs()
    {
        return $this->ingredienten->sum('prijs');
    }
}
