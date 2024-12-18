<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    protected $casts = [
        'status' => BestelStatus::class,
    ];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }
}
