@extends('layout')

@section('title', '| Artists')

@section('content')

    @component('partials._container')
        @slot('slot1')
            Artists
        @endslot

        @slot('slot2')

                        {{--{{count($posts->)}}--}}

                            <div class="post-box text-center">
                                <div class="post-header ">
                                    {{--{{dd($artists)}}--}}

                                    @foreach($artists as $posts)


                                        {{--@foreach($posts as $post)--}}
                                        {{--{{dd($post)}}--}}
                                    {{--<h2><a href="{{route('artistSingle', $posts[0]->artist_name)}}">{{($posts[0]->artist_name)}} ({{count($posts)}})</a></h2>--}}
                                    {{--@endforeach--}}
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <button type="button" class="panel-heading list-group-item " data-toggle="collapse" data-parent="#accordion" href="#collapse{{$posts[0]->id}}">
                                                    <h4 class="panel-title text-center">
                                                        <a>{{($posts[0]->artist_name)}} ({{count($posts)}})</a>
                                                    </h4>
                                                </button>
                                                <div id="collapse{{$posts[0]->id}}" class="panel-collapse collapse">
                                                    <div class="panel-body">

                                                        @foreach($posts->take(4) as $post)
                                                        <a href="{{url('post/'.$post->slug)}}">
                                                        <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block">
                                                        </a>

                                                        <p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>
                                                        @endforeach

                                                        <hr>
                                                        <p><a href="{{route('artistSingle', $post->artist_name)}}">Show All Posts With Works of Arts of This Artist</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                    {{--<h4><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</h4>--}}
                                {{--</div>--}}

                                {{--<div class="post-image">--}}


                                {{--</div>--}}


                                {{--<div class="post-caption">--}}

                                    {{--<p><span>Artist Name: </span>{{$post->artist_name}}</p>--}}

                                    {{--<p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>--}}

                                    {{--<p><span>Description:</span> {{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}</p>--}}

                                    {{--<p><span>Category:</span> <a href="{{route('categoryShow', $post->category->id)}}">{{$post->category->name}}</a></p>--}}

                                    {{--<p>@foreach($post->tags as $tag) <a class="label label-default" href="{{route('tagShow', $tag->id)}}" style="margin: 2px"> {{$tag->name}} </a>@endforeach</p>--}}
                                {{--</div>--}}



                                @endforeach

                            </div>
                    </div>
                </div>
        @endslot
    @endcomponent
@endsection