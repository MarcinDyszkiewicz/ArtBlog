@extends('layout')

@section('title', "| $post->artist_name $post->title")

@section('content')

    @component('partials._container')
        @slot('slot1')
            Post: {{$post->artist_name}} {{$post->title}}
        @endslot

        @slot('slot2')

                                <div class="single-post-box text-center">
                                    <div class="post-header ">


                                    <div class="post-image">

                                        <img src="{{asset('/images/' . $post->img)}}" height="300" width="600" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block">

                                    </div>


                                    <div class="post-caption">

                                        <p><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</p>
                                    </div>
                                        <h3><span>Artist Name: </span>{{$post->artist_name}}</h3>

                                        <h3><span>Title:</span> {{$post->title}}</h3>

                                        <h4><span>Description:</span> {{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}</h4>

                                        <p><span>Category:</span> <a href="{{route('categoryShow', $post->category->id)}}">{{$post->category->name}}</a></p>

                                        <p>@foreach($post->tags as $tag) <a class="label label-default" href="{{route('tagShow', $tag->id)}}" style="margin: 2px"> {{$tag->name}} </a>@endforeach</p>
                                    </div>






<hr>
<div class="comment-box text-left">

    <div class="row">
        <div id="comment-form" class="col-md-12">
            @if(Auth::check() || Auth::guard('admin')->check())
                {{Form::open(['route' => ['commentStore', $post->id], 'method' => 'POST', 'data-parsley-validate' => ''])}}

                {{Form::label('comment_body', 'Comment:')}}
                {{Form::text('comment_body', null, ['cass' => 'form-control', 'required' => '', 'maxlength' =>"200"])}}

                {{Form::submit('Add comment', ['class' => 'btn btn-success btn-sm'])}}
                {{Form::close()}}
            @else
                Adding comments just for registered users. <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">make new account</a> to add comment.
            @endif

        </div>
    </div>

            <div class="row">
                <div id="comment-list" class="col-md-12">
                    <div class="comment-count">
                        @if(count($post->comments) > 0)
                        Comments ({{count($post->comments)}})
                        @else
                            This Post has no comments yet. Be the first one and add comment.
                        @endif
                    </div>

                    @foreach($post->comments as $comment)
                        <hr>
                        <div class="comment">
                            <div class="comment-user">
                                user: <a href="{{route('userShow', $comment->user->id)}}"> {{$comment->user->name}}</a>
                            </div>
                            <div class="comment-body">
                                comment: {{$comment->comment_body}}
                            </div>
                            <div class="comment-created-at">
                                create at: {{$comment->created_at}}
                            </div>


                            <div class="comment-reply">
                                <button class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#add-reply">Reply to this comment</button>
                                <div id="add-reply" class="collapse">
                                    @if(Auth::check() || Auth::guard('admin')->check())
                                    {{Form::open(['route' => ['commentReplyStore', $comment->id], 'method' => 'POST', 'data-parsley-validate' => ''])}}

                                    {{Form::label('comment_reply_body', 'Comment:')}}
                                    {{Form::text('comment_reply_body', null, ['cass' => 'form-control', 'required' => '', 'maxlength' =>"200"])}}

                                    {{Form::submit('Add reply', ['class' => 'btn btn-success btn-sm'])}}
                                    {{Form::close()}}
                                </div>
                            </div>
                            @else
                                Adding comments just for registered users. <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">make new account</a> to reply to this comment.
                            @endif
                            @endforeach

                        </div>
                        </div>
                        </div>
                </div>
            </div>





        @endslot
    @endcomponent
@endsection