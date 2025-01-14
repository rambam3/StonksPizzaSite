<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bestelregel extends Model
{
    protected $fillable = ['bestelling_id', 'pizza_id', 'aantal', 'afmeting',];
    protected $readonly = ['regelprijs'];

    public function bestelling()
    {
        return $this->belongsTo(Bestelling::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function regelprijs()
    {
        $basisprijs = $this->pizza->prijs();
        $factor = match ($this->afmeting) {
            'klein' => 0.8,
            'normaal' => 1,
            'groot' => 1.2
        };
        return $basisprijs * $factor * $this->aantal;
    }
}
