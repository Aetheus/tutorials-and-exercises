<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        //$articles = Article::all();
        $articles =
            Article::latest("published_at")->published()->get(); //latest(field) orders results in desc order; "published" is a custom scope for Article model
        return view("articles.index", compact("articles") );
    }

    public function create(){
        return view("articles.create");
    }

    public function store(){
        $input = Request::all();

        Article::create([
            "title" => $input["title"],
            "body"  => $input["body"],
            "published_at" => $input["published_at"]
        ]);

        return redirect("articles");
    }

    public function show($id){
        //note the findOrFail function will try to find the item in the DB - if it fails, it throws an exception
        $article = Article::findOrFail($id);

        return view("articles.show", compact("article") );
        /*  The long way:
                $article = Article::find($id);
                //IF NULL, abort
                if(is_null($article)){
                    abort(404);
                }
                return view("articles.show", compact("article") );
        */
    }

    public function future(){
        $articles = Article::orderBy("published_at", "asc")->unpublished()->get();
        return view("articles.index", compact("articles") );
    }
}
