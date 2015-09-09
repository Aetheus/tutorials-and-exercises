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
Route::get("/", function (){

});

Route::get("about", "PagesController@about");
Route::get("contact", "PagesController@contact");

Route::get("articles", "ArticleController@index");
Route::get("articles/create", "ArticleController@create");
Route::get("articles/future", "ArticleController@future");
Route::get("articles/{id}", "ArticleController@show");
//always put the wildcard route BELOW all the other routes

Route::post("articles", "ArticleController@store");
