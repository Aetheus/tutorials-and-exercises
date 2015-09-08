@extends("master")

@section("content")
    <h1> About: {{ $softwareName }} </h1>
    <p>
        Created by: {{ $name }} <br />
        Named: {{ $softwareName }} <br />
        In the year of: {{ $yearOfCreation }}
    </p>
@stop
