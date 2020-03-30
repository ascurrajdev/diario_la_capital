<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function color(){
        return $this->belongsTo('App\Color');
    }
}
