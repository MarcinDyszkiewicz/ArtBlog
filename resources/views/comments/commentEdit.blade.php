@extends('layout')

@section('title', '| Comment Edit')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit your post</h1>

            {!! Form::model($comment, array('route' => ['commentUpdate', $comment->id], 'method' => 'PUT')) !!}

            {{Form::label('comment_body', 'Comment:')}}
            {{Form::text('comment_body', null, ['cass' => 'form-control', 'required' => '', 'maxlength' =>"200"])}}

            {{Form::submit('Edit Comment', ['class' => 'btn btn-success btn-sm'])}}

            {!! Html::linkRoute('postShow', 'Cancel', array($comment->post_id), array('class' => 'btn btn-danger')) !!}

            {!! Form::close() !!}


        </div>
    </div>

@endsection

@section('scripts')
@endsection

@section('footer')


@endsection
