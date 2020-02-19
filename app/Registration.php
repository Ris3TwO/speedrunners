<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use Translatable;
    protected $translatable = [
        'names', 'last_names', 'age', 'email', 'city', 'gender', 'shoes', 'team', 'distance', 'best_time', 'email_notices'
    ];

    protected $fillable = [
        'names', 'last_names', 'age', 'email', 'city', 'gender', 'shoes', 'team', 'distance', 'best_time', 'email_notices'
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
        $this->attributes['names'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setLastnamesAttribute($valor)
    {
        $this->attributes['last_names'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setCityAttribute($valor)
    {
        $this->attributes['city'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setGenderAttribute($valor)
    {
        $this->attributes['gender'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setShoesAttribute($valor)
    {
        $this->attributes['shoes'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setTeamAttribute($valor)
    {
        $this->attributes['team'] = ucwords(mb_strtolower($valor, 'UTF-8'));
    }

    public function setBesttimeAttribute($valor)
    {
        $this->attributes['best_time'] = strtoupper($valor);
    }

    public function getEmailnoticesBrowseAttribute()
    {
        return ($this->email_notice === true ? 'Si' : 'No');
    }
}
