@extends('layout')

@section('title', '| Post Edit')

@section('content')

    <link href="/css/select2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit your post</h1>

        {!! Form::model($post, array('route' => ['postUpdate', $post->id], 'method' => 'PUT', 'files' => true)) !!}


            {{Form::label('artist_name', 'Artist Name:')}}
            {{Form::text('artist_name', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' =>"80"))}}

            {{Form::label('title', 'Title:')}}
            {{Form::text('title', null, array('class' => 'form-control input-lg', 'minlength' =>"2", 'maxlength' =>"100"))}}

            <img src="{{asset('/images/' . $post->img)}}" height="100" width="200"/>
            {{Form::label('img', 'Change Image:')}}
            {{Form::file('img')}}

            {{Form::label('category_id', 'Category:')}}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option {{ ($category->id == $post->category_id) ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            {{Form::label('tags', 'Tags:')}}
            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option {{ ($post->id == $tag->id) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>

            {{Form::label('description', 'Description:')}}
            {{Form::textarea('description', null, array('class' => 'form-control', 'minlength' =>"5", 'maxlength' =>"1000"))}}
            <script>
                CKEDITOR.replace( 'description' );
            </script>

            {{Form::submit('Edit Post', array('class'=>'btn btn-success btn-lg btn-block'))}}

            {!! Html::linkRoute('postSingle', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn=block')) !!}

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
            $('.js-example-basic-multiple').select2();
        });

        $('#mySelect2').val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');


    </script>


@endsection




