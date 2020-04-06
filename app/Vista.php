<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vista extends Model
{
    public function pais(){
        $this->belongsTo("App\Country");
    }
}
