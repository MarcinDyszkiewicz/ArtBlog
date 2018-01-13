@extends('layout')

@section('title', '| All Categories')

@section('content')

@component('partials._container')
    @slot('slot1')
        All Categories
    @endslot

    @slot('slot2')

                        <div class="categories-list-menu">

                            <div class="list-group" id="accordion">

                                <button type="button" class="list-group-item list-group-item-action active">
                                    Cras justo odio
                                </button>
                                @foreach($categories as $category)

                                    <button type="button" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#collapse{{$category->id}}" data-parent="#accordion" href="#collapse{{$category->id}}" aria-expanded="true">{{$category->name}}</button>
                                @endforeach

                            </div>
                        </div>



                        {{--Categories list head--}}
                        <div class="categories-list-head">
                            @foreach($categories as $category)
                                <div class="collapse in" id="collapse{{$category->id}}">
                                    <div class="well text-center">

                                        <div class="categories-list-posts-btn">
                                            <a class="btn btn-show-more-category" href="{{route('categoryShow', $category->id)}}"> Show All </a>
                                        </div>

                                        @foreach($category->posts->take(5) as $post)

                                            <div class="categories-list-head-image"><a href="{{url('post/'.$post->slug)}}"><img src="{{asset('/images/' . $post->img)}}" height="250" width="500" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block"></a>
                                            </div>
                                            <p>{{$post->artist_name}} - {{$post->title}}</p>

                                            <p>{{str_limit(strip_tags($post->description), $limit = 30, $end = '...')}}</p>


                                        @endforeach

                                        <div class="categories-list-body">

                                            {{--category list of post--}}
                                            <div class="categories-list-posts">


                                                <div class="categories-list-posts-btn">
                                                    <a class="btn btn-show-more-category" href="{{route('categoryShow', $category->id)}}"> Show All </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach


@endslot
@endcomponent
    @endsection