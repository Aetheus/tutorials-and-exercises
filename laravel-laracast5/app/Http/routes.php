<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//service container injection examples
Route::get("foo", "FooController@foo");
Route::get("foo/alt", "FooController@alt");


Route::get("tags/{tags}", "TagsController@show");


Route::get("about", "PagesController@about");
Route::get("contact", "PagesController@contact");

Route::resource("articles", "ArticlesController");

Route::controllers([
    "auth" => "Auth\AuthController",
    "password" => "Auth\PasswordController"
]);

Route::get("index", "PagesController@home");
Route::get("home", "PagesController@home");
Route::get("/", "PagesController@home");

Route::get("test",
[
    "middleware" => "manager",
    function(){
        return "Hi there manager";
    }
]);

Route::get("exampleGet", function(){
    $colour = Input::get("colour") ? Input::get("colour") : "undefined";
    $name = Input::get("name") ? Input::get("name") : "nameless";

    return response()->json(["msg" => "Hellos, $name. Your colour was $colour"]);
});



/*Service Container example code below*/


interface BarInterface{}

class Baz{}
class Bar implements BarInterface{
    public $baz; public $tofu;
    public function __construct(Baz $baz){
        $this->baz = $baz;
    }
}
class SecondBar implements BarInterface{}

/*You could do it like this*/
App::bind("BarInterface", function (){
    $newBar = new Bar(new Baz);
    $newBar->tofu = "yes, tofu";
    return $newBar;
});
//or like this, if you don't need to bind with any specific settings:
//App::bind("BarInterface","SecondBar");

Route::get("bar", function(BarInterface $bar){
    dd($bar);
});

Route::get("foobar", function(){
    //gets it out of the service container
    $bar = App::make("BarInterface");

    //same thng as before
    $bar = app()->make("BarInterface");

    //same thing as before
    $bar = app("BarInterface");

    dd($bar);
});





/*Route::get("articles", "ArticlesController@index");
Route::get("articles/create", "ArticlesController@create");
Route::get("articles/future", "ArticlesController@future");
Route::get("articles/{id}", "ArticlesController@show");
always put the wildcard route BELOW all the other routes
Route::post("articles", "ArticlesController@store");
Route::get("articles/{id}/edit", "ArticlesController@edit");
*/
