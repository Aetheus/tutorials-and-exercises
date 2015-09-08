<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        "name", "description", "location", "length","width", "height"
    ];
}
