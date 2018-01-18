@extends('layout')

@section('title', '| All Categories')

@section('content')

@component('partials._container')
    @slot('slot1')
        All Categories
    @endslot

    @slot('slot2')

                        <div class="categories-list-menu">

                            <ul class="nav nav-pills nav-stacked">

                                @foreach($categories as $category)

                                    <li><a data-toggle="pill" class="list-group-item list-group-item-action" href="#tab-{{ $category->id }}">{{$category->name}}</a></li>

                                @endforeach
                            </ul>

                        </div>




                        {{--Categories list head--}}
                        <div class="categories-list-head">




                                <div class="tab-content">
                                    @foreach($categories as $category)
                                        <div id="tab-{{ $category->id }}" class="tab-pane">
                                            <div class="collapse in" style="margin-top: 2vh">
                                                @foreach($category->posts->take(5) as $post)
                                                    <div class="categories-list-head-image"><a href="{{url('post/'.$post->slug)}}"><img src="{{asset('/images/' . $post->img)}}" height="250" width="500" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive"></a>
                                                    </div>
                                                    <p><a href="{{url('post/'.$post->slug)}}">{{$post->artist_name}} - {{$post->title}}</a></p>

                                                    <p>{{str_limit(strip_tags($post->description), $limit = 30, $end = '...')}}</p>
                                                @endforeach

                                                <hr>
                                                    <div class="categories-list-posts-btn">
                                                        <a class="btn btn-show-more-category" href="{{route('categoryShow', $category->id)}}"> Show All </a>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>



                        </div>

@endslot
@endcomponent
    @endsection