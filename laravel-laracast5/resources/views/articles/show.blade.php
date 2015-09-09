@extends("master")

@section("content")

@if(isset($article))
<h1> {{ $article->title }} </h1>
<p>
    {{ $article->published_at }}
</p>
<p>
    {{ $article->body }}
</p>
@endif

@stop
