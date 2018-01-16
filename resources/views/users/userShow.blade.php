@extends('layout')

@section('title', "| User $user->name")

@section('content')

    @component('partials._container')
        @slot('slot1')
            Username: <span style="text-transform:capitalize">{{$user->name}}</span>
        @endslot

        @slot('slot2')
               <div class="user-posts">
                   <h3>Joined on {{date('d M, Y', strtotime($user->created_at))}}</h3>
                    <h2>{{$user->name}}'s posts({{count($user->posts)}}):</h2>
                    {{--<td>@foreach($user->posts as $post){{$post->title}}</td>@endforeach--}}
                    @foreach($user->posts as $post)
                        <div class="post-box text-center">
                            <div class="post-header ">

                                <h2><a href="{{url('post/'.$post->slug)}}">{{$post->artist_name}} - {{$post->title}} </a></h2>

                                <h4><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</h4>
                            </div>

                            <div class="post-image">

                                <img src="{{asset('/images/' . $post->img)}}" height="300" width="600" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive">

                            </div>


                            <div class="post-caption">

                                <p><span>Artist Name: </span>{{$post->artist_name}}</p>

                                <p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>

                                <p><span>Description:</span> {{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}</p>

                                <p><span>Category:</span> <a href="{{route('categoryShow', $post->category->id)}}">{{$post->category->name}}</a></p>

                                <p>@foreach($post->tags as $tag) <a class="label label-default" href="{{route('tagShow', $tag->id)}}" style="margin: 2px"> {{$tag->name}} </a>@endforeach</p>
                                <p><a href="{{route('postEdit', $post->id)}}" class="btn btn-primary">Edit</a>
                                    {{ Form::open(array('route' => ['postDestroy', $post->id], 'method' => 'DELETE'))}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{Form::close()}}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <hr>

                    <div class="user-comments">
                        <h2>{{$user->name}}'s comments({{count($user->comments)}}):</h2>
                        @foreach($user->comments as $comment)
                            <p>{{$comment->comment_body}}</p>@endforeach

                    </div>
                    <hr>
                    <div class="user-comments-replies">
                        <h2>{{$user->name}}'s comment replies({{count($user->commentReplies)}}):</h2>
                    @foreach($user->commentReplies as $commentReply)
                            <p>{{$commentReply->comment_reply_body}}</p>@endforeach





                    </div>

        @endslot
    @endcomponent
@endsection