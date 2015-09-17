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
<h5>Tags:</h5>
<ul>
    @foreach($article->tags as $tag)
    <li> {{$tag->name}} </li>
    @endforeach
</ul>
@endif

@stop
