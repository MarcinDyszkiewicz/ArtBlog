@extends('layout')

@section('title', '| Post Edit')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit your post</h1>

                {!! Form::model($post, array('route' => 'postUpdate', $post->id)) !!}


            {{Form::label('artist_name', 'Artist Name:')}}
            {{Form::text('artist_name', null, array('class' => 'form-control input-lg'))}}

            {{Form::label('title', 'Title:')}}
            {{Form::text('title', null, array('class' => 'form-control'))}}

            {{Form::label('description', 'Description:')}}
            {{Form::textarea('description', null, array('class' => 'form-control'))}}

            {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block'))}}

            {!! Form::close() !!}


        </div>
    </div>

    @endsection

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-hover" width="100%">
            <thead>
            <th>Artist Name</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>


            </thead>
            <tbody>
            <tr>
                <td>{{$post->artist_name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->img}}</td>
                <td>{{$post->created_at}}</td>


            </tr>
            </tbody>
        </table>

    </div>
</div>



