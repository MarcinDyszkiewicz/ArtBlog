@extends('layout')

@section('title', '| All Posts')

@section('content')

    @component('partials._container')
        @slot('slot1')
            Post List
        @endslot

        @slot('slot2')

               @foreach($posts as $post)
            <div class="post-box text-center">
                <div class="post-header ">

                    <h2><a href="{{url('post/'.$post->slug)}}">{{$post->artist_name}} - {{$post->title}} </a></h2>

                    <h4><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</h4>
                </div>

                <div class="post-image">

                    <img  src="{{asset('/images/' . $post->img)}}" height="300" width="600" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive">

                </div>


                <div class="post-caption">

                        <p><span>Artist Name: </span>{{$post->artist_name}}</p>

                        <p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>

                        <p><span>Description:</span> {{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}</p>

                        <p><span>Category:</span> <a href="{{route('categoryShow', $post->category->id)}}">{{$post->category->name}}</a></p>

                        <p>@foreach($post->tags as $tag) <a class="label label-default" href="{{route('tagShow', $tag->id)}}" style="margin: 2px"> {{$tag->name}} </a>@endforeach</p>
                </div>



                @endforeach

            </div>
        @endslot
    @endcomponent
@endsection