<ul class="alert alert-danger">
@if($errors->any())
    @foreach($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach
@endif
</ul>
