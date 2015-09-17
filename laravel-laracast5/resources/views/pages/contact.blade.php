@extends("master")

@section("content")
    <h1> Contact </h1>

    <div>
    @if (count($phoneNums) > 0 )
        @foreach($phoneNums as $phone)
            Num: {{$phone}} <br />
        @endforeach
    @else
        No number found
    @endif
    </div>
@stop


@section("footer")
    <p> Foooooo </p>
@stop
