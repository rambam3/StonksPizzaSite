<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredienten';
    protected $fillable = ['naam', 'prijs'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredient');
    }
}
