@extends('layout')

@section('title', '| Create Tag')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Tag</h1>

            {!! Form::open(array('route' => 'tagStore')) !!}

            {{Form::label('name', 'Tag Name:')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
            <br>
            {{Form::submit('Create Tag', array('class'=>'btn btn-success btn-lg btn-block'))}}

            {!! Form::close() !!}


        </div>
    </div>

@endsection