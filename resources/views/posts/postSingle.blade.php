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
                    <td><img src="{{asset('/images/' . $post->img)}}" height="400" width="800" alt="{{$post->artist_name . " _ " . $post->title}}"/></td>
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
            @if(Auth::check() || Auth::guard('admin')->check())
                {{Form::open(['route' => ['commentStore', $post->id], 'method' => 'POST', 'data-parsley-validate' => ''])}}

                {{Form::label('comment_body', 'Comment:')}}
                {{Form::text('comment_body', null, ['cass' => 'form-control', 'required' => '', 'maxlength' =>"200"])}}

                {{Form::submit('Add comment', ['class' => 'btn btn-success btn-sm'])}}
            @else
                Adding comments just for registered users. <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">make new account</a> dto add comment.
            @endif

        </div>
    </div>

            <div class="row">
                <div id="comment-form" class="col-md-8 col-md-offset-2">
                    <div class="comment-count">
                        @if(count($post->comments) > 0)
                        Comments ({{count($post->comments)}})
                        @else
                            This Post has no comments yet. Be the first one and add comment.
                        @endif
                    </div>
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <p>{{$comment->comment_body}}</p>

                            <button data-toggle="collapse" data-target="add-reply">Reply to this comment</button>
                            <div id="add-reply" class="collapse">
                                Lorem ipsum dolor text....
                            </div>
                            @endforeach

                        </div>
                </div>
            </div>





@endsection