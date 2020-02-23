<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MexicoDescription extends Model
{
    protected $fillable = [
        'title', 'content', 'image', 'image_over', 'section', 'order'
    ];
}
