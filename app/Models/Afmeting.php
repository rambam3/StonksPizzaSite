<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class afmeting extends Model
{
    protected $table = 'afmetingen';
    
    protected $fillable = ['grootte'];
    public $timestamps = false;

    public function bestelregel()
    {
        return $this->hasMany(Bestelregel::class);
    }
}   
