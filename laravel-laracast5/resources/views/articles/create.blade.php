@extends("master")

@section("content")
    <h1> Write a New Article </h1>
    <hr/>

    {!! Form::model($article = new \App\Article(), [ "action" => "ArticlesController@store" ]) !!}
        @include("articles._form", ["submitButtonText" => "Add Article"]);
    {!! Form::close() !!}

    @include("errors.list")
@stop
