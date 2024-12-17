<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    protected $fillable = ['klant_id', 'datum', 'status'];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }
}
