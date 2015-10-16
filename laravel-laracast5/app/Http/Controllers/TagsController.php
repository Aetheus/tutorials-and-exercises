<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    //route model binding in place here
    public function show(Tag $tags)
    {
        $articles = $tags->articles()->published()->get();

        return view("articles.index", compact("articles"));
    }
}
