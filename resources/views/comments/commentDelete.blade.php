@extends('layout')

@section('title', "| Comment Delete?")

@section('content')




    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            <h1>Are you sure you want to delete this comment?</h1>

                <p>{{$comment->comment_body}}</p><br>

                {{Form::open(['route' => ['commentDestroy', $comment->id], 'method' => 'DELETE'])}}
                {{Form::submit('Yes I Want to Delete This Comment', ['class'=> 'btn btn-lg'])}}
                {{Form::close()}}
            <br>
            {!! Html::linkRoute('postShow', 'Cancel', array($comment->post_id), array('class' => 'btn btn-danger btn-sm')) !!}

        </div>
    </div>


    @endsection