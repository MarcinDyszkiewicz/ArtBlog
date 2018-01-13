@extends('layout')

@section('title', '| Homepage')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="post-index">
                @foreach($posts as $post)
                <div class="post-index-single">


                <div class="image">
                    <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}"/>
                </div>
                    <div class="artis-name">
                        {{$post->artist_name}}
                    </div>
                <div class="title">
                     Title:<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>
                </div>



                    <td>{!!str_limit(strip_tags($post->description), $limit = 50, $end = '...')!!}</td>

                </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection