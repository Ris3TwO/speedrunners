<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'names', 'last_names', 'age', 'email', 'city', 'genre', 'shoes', 'team', 'distance','best_time'
    ];

    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function setDistanceAttribute($valor)
    {
        $this->attributes['distance'] = strtoupper($valor);
    }
}
