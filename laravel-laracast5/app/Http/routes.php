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

Route::get("foo",
[
    "middleware" => "manager",
    function(){
        return "Hi there manager";
    }
]);

/*Route::get("articles", "ArticlesController@index");
Route::get("articles/create", "ArticlesController@create");
Route::get("articles/future", "ArticlesController@future");
Route::get("articles/{id}", "ArticlesController@show");
always put the wildcard route BELOW all the other routes
Route::post("articles", "ArticlesController@store");
Route::get("articles/{id}/edit", "ArticlesController@edit");
*/
