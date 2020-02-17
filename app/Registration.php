<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'names', 'last_names', 'age', 'email', 'city', 'gender', 'shoes', 'team', 'distance','best_time'
    ];

    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function setDistanceAttribute($valor)
    {
        $this->attributes['distance'] = strtoupper($valor);
    }

    public function setNamesAttribute($valor)
    {
        $this->attributes['names'] = ucwords(strtolower($valor));
    }

    public function setLastnamesAttribute($valor)
    {
        $this->attributes['lastnames'] = ucwords(strtolower($valor));
    }

    public function setCityAttribute($valor)
    {
        $this->attributes['city'] = ucwords(strtolower($valor));
    }

    public function setGenderAttribute($valor)
    {
        $this->attributes['gender'] = ucwords(strtolower($valor));
    }

    public function setShoesAttribute($valor)
    {
        $this->attributes['shoes'] = ucwords(strtolower($valor));
    }

    public function setTeamAttribute($valor)
    {
        $this->attributes['team'] = ucwords(strtolower($valor));
    }
}
