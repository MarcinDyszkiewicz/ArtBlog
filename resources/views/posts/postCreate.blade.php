@extends('layout')

@section('title', '| Create Post')

@section('content')

    <link href="/css/select2.min.css" rel="stylesheet">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>

    {!! Form::open(array('route' => 'postStore')) !!}

        {{Form::label('artist_name', 'Artist Name:')}}
        {{Form::text('artist_name', null, array('class' => 'form-control'))}}

        {{Form::label('title', 'Title:')}}
        {{Form::text('title', null, array('class' => 'form-control'))}}

        {{Form::label('category_id', 'Category:')}}
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        {{Form::label('tags', 'Tags:')}}
        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        {{Form::label('description', 'Description:')}}
        {{Form::textarea('description', null, array('class' => 'form-control'))}}

        {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block'))}}

    {!! Form::close() !!}


        </div>
    </div>
@endsection


@section('scripts')



@endsection

@section('footer')
    {{--<link href="{{ asset('/public/js/select2.min.js') }}">--}}

    <script src="/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags:true,
            maximumSelectionLength: 20
        });

    });


</script>
    @endsection