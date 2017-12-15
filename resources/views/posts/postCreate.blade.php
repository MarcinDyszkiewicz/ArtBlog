@extends('layout')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>

{!! Form::open(array('route' => 'postStore')) !!}

{{Form::label('artist_name', 'Artist Name:')}}
{{Form::text('artist_name', null, array('class' => 'form-control'))}}

{{Form::label('title', 'Title:')}}
{{Form::text('title', null, array('class' => 'form-control'))}}

{{Form::label('description', 'Description:')}}
{{Form::textarea('description', null, array('class' => 'form-control'))}}

{{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block'))}}

{!! Form::close() !!}


        </div>
    </div>

    @endsection