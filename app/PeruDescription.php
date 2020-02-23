<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeruDescription extends Model
{
    protected $fillable = [
        'title', 'content', 'image', 'image_over', 'section', 'order'
    ];
}
