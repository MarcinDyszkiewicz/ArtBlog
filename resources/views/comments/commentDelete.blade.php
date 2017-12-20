@extends('layout')

@section('title', "| Post Delete?")

@section('content')




    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT</h1>

                <p>{{$comment->comment_body}}</p>

                {{Form::open(['route' => 'commentDelete', 'method' => 'DELETE'])}}
                {{Form::submit('Yes I Want to Delete This Comment', ['class'=> 'btn btn-lg'])}}
                {{Form::close()}}
        </div>
    </div>


    @endsection