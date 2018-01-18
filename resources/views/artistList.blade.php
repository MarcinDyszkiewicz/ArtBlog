@extends('layout')

@section('title', '| Artists')

@section('content')

    @component('partials._container')
        @slot('slot1')
            Artists
        @endslot

        @slot('slot2')

                            <div class="post-box text-center">
                                <div class="post-header ">

                                        <ul class="nav nav-pills nav-stacked">

                                            @foreach($artists as $posts)

                                            <li><a data-toggle="pill" class="list-group-item list-group-item-action" href="#tab-{{ $posts[0]->id }}">{{$posts[0]->artist_name}} ({{count($posts)}})</a></li>

                                            @endforeach
                                        </ul>



                                        <div class="tab-content">
                                                @foreach($artists as $posts)
                                            <div id="tab-{{ $posts[0]->id }}" class="tab-pane">
                                                <div class="collapse in" style="margin-top: 2vh">
                                                        @foreach($posts->take(4) as $post)
                                                    <a href="{{url('post/'.$post->slug)}}">
                                                        <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive">
                                                        </a>

                                                        <p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>
                                                        @endforeach

                                                        <hr>
                                                </div>
                                            </div>
                                                @endforeach

                                        </div>
                    </div>
                </div>
        @endslot
    @endcomponent
@endsection

@section('scripts')



    @endsection