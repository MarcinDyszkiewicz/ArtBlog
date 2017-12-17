@extends('layout')

@section('title', '| Create Category')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Category</h1>

            {!! Form::open(array('route' => 'categoryStore')) !!}

            {{Form::label('name', 'Category Name:')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
            <br>
            {{Form::submit('Create Category', array('class'=>'btn btn-success btn-lg btn-block'))}}

            {!! Form::close() !!}


        </div>
    </div>

@endsection