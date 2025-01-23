<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BestelStatus;

class Bestelling extends Model
{
    protected $table = 'bestellingen';

    protected $fillable = [
        'klant_id',
        'user_id',
        'status',
        'datum',
        'bestelMethode',
        'totaalPrijs',
    ];
    protected $casts = [
        'status' => BestelStatus::class,
    ];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }

    public function bestelregels()
    {
        return $this->hasMany(Bestelregel::class);
    }
}
