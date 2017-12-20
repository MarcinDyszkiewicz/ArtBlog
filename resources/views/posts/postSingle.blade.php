@extends('layout')

@section('title', "| $post->artist_name $post->title")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>Artist Name</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Created At</th>


                </thead>
                <tbody>
                <tr>
                    <td>{{$post->artist_name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{!!$post->description!!}</td>
                    <td>{{$post->img}}</td>
                    <td>{{$post->category->name}}</td>
                    @foreach($post->tags as $tag)<td> <span class="label label-default">{{$tag->name}}</span></td>@endforeach
                    <td>{{$post->created_at}}</td>



                </tr>
                </tbody>
            </table>
        </div>
    </div>

            <div class="row">
                <div id="comment-form" class="col-md-8 col-md-offset-2">
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <p>{{$comment->comment_body}}</p>
                            @endforeach
                        </div>
                </div>
            </div>


    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {{Form::open(['route' => ['commentStore', $post->id], 'method' => 'POST', 'data-parsley-validate' => ''])}}

            {{Form::label('comment_body', 'Comment:')}}
            {{Form::text('comment_body', null, ['cass' => 'form-control', 'required' => '', 'maxlength' =>"200"])}}

            {{Form::submit('Add comment', ['class' => 'btn btn-success btn-sm'])}}
        </div>
    </div>


@endsection