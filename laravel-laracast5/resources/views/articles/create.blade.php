@extends("master")

@section("content")
    <h1> Write a New Article </h1>
    <hr/>

    {!! Form::open([ "action" => "ArticleController@store" ]) !!}
        <div class="form-group">
            {!! Form::label("title", "Title") !!}
            {!! Form::text("title", null, ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("body", "Body") !!}
            {!! Form::textarea("body", null, ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("published_at", "Publish On:") !!}
            {!! Form::input("date", "published_at", date("Y-m-d"), ["class" => "form-control"]) /* "date" here sets the type of the input - in this case, date*/!!}
        </div>
        <div class="form-group">
            {!! Form::submit("Add an Article", ["class" => "btn btn-primary form-control"]) !!}
        </div>

    {!! Form::close() !!}

@stop
