@extends('layout')

@section('title', '| Edit Tag')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Tag</h1>

            {!! Form::model($tag, array('route' => ['tagUpdate', $tag->id], 'method' => 'PUT')) !!}

            {{Form::label('name', 'Tag Name:')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
            <br>
            {{Form::submit('Save Changes', array('class'=>'btn btn-success btn-lg btn-block'))}}

            {!! Form::close() !!}


        </div>
    </div>

@endsection