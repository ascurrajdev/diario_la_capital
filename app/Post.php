<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
    public function relevancia(){
        return $this->belongsTo('App\Relevancia','nivel_relevancia_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
