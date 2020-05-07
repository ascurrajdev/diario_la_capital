<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function vistas(){
        return $this->hasMany('App\Vista','pais_id');
    }
}
