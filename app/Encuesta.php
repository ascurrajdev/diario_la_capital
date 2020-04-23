<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $casts = [
        'opciones' => 'array'
    ];
    public function respuestas(){
        return $this->hasMany('App\Respuesta');
    }
}
