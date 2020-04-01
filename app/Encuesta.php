<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $casts = [
        'opciones' => 'array'
    ];
}
