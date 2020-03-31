<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $casts = [
        'json_role' => 'array'
    ];

}
