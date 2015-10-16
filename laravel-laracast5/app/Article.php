<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //allow mass assignment via Article::create([ "title"=>"bob", "title"=>"jack" ... ])
    protected $fillable = [
        "title", "body", "excerpt", "published_at",
    ];

    //thanks to this attribute, the published_at field will be retrieved as a Carbon object instead of a plain string
    // e.g: $article->published_at will now give us a Carbon time object
    protected $dates = ["published_at"];

    //this mutator will activate automatically when the published_at field is modified.
    //note the convention and follow it: set[NameOfAttribute]Attribute. underscores are converted to camel-case
    public function setPublishedAtAttribute($date){
        $this->attributes["published_at"] = Carbon::parse($date);
    }

    //this accessor will activate automatically when the published_At field is accessed
    //e.g:  $bar = $article->published_at
    public function getPublishedAtAttribute($date){
        return new Carbon($date);
    }

    //this is a scope; use it to retrieve models matching the scope
    //note the convetion: scope[NameOfScope]
    //you would use this elsewhere like so: Article::all()->published()->get()
    public function scopePublished($query){
        $query->where("published_at", "<=", Carbon::now() );
    }

    public function scopeUnpublished($query){
        $query->where("published_at", ">", Carbon::now() );
    }

    //an article is owned by a user; use this like so - $article->user OR $article->user()->get();
    public function user(){
        return $this->belongsTo("App\User");
    }

    //this is a many-to-many relationship, linked via a link table. The Tag model has a similar one
    //$art->tags()->attach($tagID);
    public function tags(){
        return $this->belongsToMany("App\Tag")->withTimestamps();
    }

    //get a list of tag ids associated with the article
    //$art->tag_list()
    public function getTagListAttribute(){
        return $this->tags->lists("id")->all();
    }
}
