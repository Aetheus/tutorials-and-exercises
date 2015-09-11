<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;


class ArticlesController extends Controller
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

    public function edit($id){
        $article = Article::findOrFail($id);

        return view("articles.edit", compact("article") );
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

    public function store(ArticleRequest $request){
        $input = $request->all();

        Article::create([
            "title" => $input["title"],
            "body"  => $input["body"],
            "published_at" => $input["published_at"],
            "user_id" => $input["user_id"] /*temporary!!!*/            
        ]);

        return redirect("articles");
    }

    //  alternative way to accomplish the above without needing a specific request subclass
    public function store2(Request $request){
        $this->validate($request, ["body" => "required", "title"=> "required|min:3", "published_at" => "required"]);

        $input = $request->all();
        Article::create([
            "title" => $input->title,
            "body" => $input->body,
            "published_at" => $input->published_at
        ]);

        return redirect("articles");
    }

    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect("articles");
    }


    public function future(){
        $articles = Article::orderBy("published_at", "asc")->unpublished()->get();
        return view("articles.index", compact("articles") );
    }
}
