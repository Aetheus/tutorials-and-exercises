
{{-- note, the form model binding occurs in the edit and create pages, not here --}}
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
    {!! Form::input("date", "published_at", $article->published_at->format("Y-m-d"), ["class" => "form-control"]) /* "date" here sets the type of the input - in this case, date*/!!}
</div>
<div class="form-group">
    {!! Form::label("taglist", "Tags:") !!}
    {!! Form::select("taglist[]", $tags,null, ["id" => "tag_list", "class" => "form-control", "multiple"]) /* select box */!!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ["class" => "btn btn-primary form-control"]) !!}
</div>

@section("footer")
<!--see master page for more on footer-->
    <script type="text/javascript">
        $("#tag_list").select2({
            placeholder : "Choose a tag"
            //,tags:true
        });
    </script>

@endsection
