@extends("master")


@section("content")
<h1> Articles </h1>


@foreach($articles as $article)
    <article class="">
        <a href="{{ action("ArticlesController@show",[$article->id]) }}">
            <h1>{{$article->title }}</h1>
        </a>
        <p> {{$article->published_at}} </p>
        <p> {{$article->body  }}</p>
    </article>
@endforeach

@stop
