<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;


class ArticlesController extends Controller
{

    public function __construct(){
        //$this->middleware("auth", ["only" => "create"]);  //the "auth" middleware route was defined in Http\Kernel.php
        //run it ONLY on the create method

        $this->middleware("auth", ["except" => ["index", "show"]]);

        //OR
        //$this->middleware("auth", ["except" => "index"]);
        //middleware will be applied to all routes except index
    }

    public function index(){
        //$articles = Article::all();
        $articles =
            Article::latest("published_at")->published()->get(); //latest(field) orders results in desc order; "published" is a custom scope for Article model
        
        return view("articles.index", compact("articles"));
    }

    public function create(){
        $tags = Tag::lists("name","id");

        return view("articles.create", compact("tags"));
    }

    public function edit(Article $article){
        $tags = Tag::lists("name","id");

        return view("articles.edit", compact("article", "tags") );
    }

    //note that this works because of model binding. look in RouteServicesProvider.php
    public function show(Article $article){
        //note the findOrFail function will try to find the item in the DB - if it fails, it throws an exception
        //$article = Article::findOrFail($id);

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
        $this->createArticle($request);

        flash()->overlay("Your article has been created", "Success!");

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

    public function update($article, ArticleRequest $request){
        $article->update($request->all());

        $tagIds = $request->input("taglist");
        $this->syncTags($article, $tagIds);
        //$article->tags()->sync($tagIds);

        return redirect("articles");
    }

    private function syncTags(Article $article, array $tags){
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request){
        $article = \Auth::user()->articles()->create($request->all());

        $tagIds = $request->input("taglist"); //returns array of submitted ids of tags
        $article->tags()->attach($tagIds);

        return $article;
    }

    public function future(){
        $articles = Article::orderBy("published_at", "asc")->unpublished()->get();
        return view("articles.index", compact("articles") );
    }
}
