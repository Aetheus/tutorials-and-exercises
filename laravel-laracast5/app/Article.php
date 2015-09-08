<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //allow mass assignment via Article::create([ "title"=>"bob", "title"=>"jack" ... ])
    protected $fillable = [
        "title", "body", "excerpt", "published_at"
    ];
}
