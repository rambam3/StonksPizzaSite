<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\BestelStatus;

class Bestelling extends Model
{
    protected $table = 'bestellingen';
    
    protected $casts = [
        'status' => BestelStatus::class,
    ];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }
}
