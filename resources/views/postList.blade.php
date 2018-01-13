@extends('layout')

@section('title', '| All Posts')

@section('content')


<div class="post-list">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

               @foreach($posts as $post)
            <div class="post-box text-center">
                <div class="post-header ">

                    <h2><a href="{{url('post/'.$post->slug)}}">{{$post->artist_name}} - {{$post->title}} </a></h2>

                    <h4><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</h4>
                </div>

                <div class="post-image">

                    <img src="{{asset('/images/' . $post->img)}}" height="300" width="600" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block">

                </div>


                <p class="post-caption">

                        <h4><span>Artist Name:</span></h4><h2>{{$post->artist_name}}</h2>
                        <h4><span>Title:</span></h4><h3>:<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></h3>

                        <p>{{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}
                        </p>
                    <p>@foreach($post->tags as $tag) <a class="label label-default" href="{{route('tagShow', $tag->id)}}" style="margin: 2px"> {{$tag->name}} </a>@endforeach</p>
                </div>



            @endforeach
                    {{--{{$post->artist_name}}--}}
                    {{--<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>--}}
                    {{--{{$post->category->name}}--}}
                    {{--{{$post->description}}--}}
                    {{--{{$post->img}}--}}
                    {{--{{$post->created_at}}--}}










                </div>
        </div>
    </div>
</div>


@endsection