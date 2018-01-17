@extends('layout')

@section('title', '| Homepage')

@section('header-button')

                    <div class="header-btns">
                        @if(Auth::check() || Auth::guard('admin')->check())
                        <a class="btn btn-make-account" href="{{route('postCreate')}}"> Create a New Post </a>
                        @else
                        <a class="btn btn-make-account" href="{{route('register')}}"> Make a New Account </a>
                        @endif
                        <a class="btn btn-tour" href="#"> Take a Tour and See Our Posts
                            <i class="fa fa-angle-down"></i>
                        </a>

                    </div>
@endsection

@section('content')

    {{--Slider--}}
    <section class="slider">

        <div class="slider-overlay">

            {{--<div class="container">--}}

                <div class="row" style="margin-right:0; margin-left:0">
                <div class="row" style="margin-right:0; margin-left:0">

                    <div class="col-md-12">

                        <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-header text-center">

                                <h1>New Posts</h1>

                            </div>
                            {{--indicators--}}
                            <ol class="carousel-indicators">
                                @foreach( $posts->take(10) as $post )
                                    <li data-target="#carousel-slider" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>

                            {{--wrapper for slides--}}
                            <div class="carousel-inner" role="listbox">

                                @foreach($posts as $post)
                                {{--item 1--}}
                                <div class="item {{ $loop->first ? ' active' : '' }} text-center">

                                    <img src="{{asset('/images/' . $post->img)}}" height="400" width="800" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive">

                                    <div class="slide-caption">

                                        <h4><span>Artist Name:</span></h4><h2>{{$post->artist_name}}</h2>
                                        <h4><span>Title:</span></h4><h3>:<a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></h3>
                                        {{--<h4><a href="{{route('userShow', $post->id_user)}}"> See author</a></h4>--}}
                                        <h4>{{str_limit(strip_tags($post->description), $limit = 50, $end = '...')}}
                                        </h4>
                                        <p><span class="italic">by </span><a href="{{route('userShow', $post->user->id)}}">{{$post->user->name}}</a><span class="italic"> on </span>{{date('F d, Y', strtotime($post->created_at))}}</p>

                                    </div>

                                </div>
                                @endforeach

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                            </div>

                        </div>

                    </div>

                {{--</div>--}}

            </div>

    </section>

    {{--Categories--}}
    <section class="categories">

        <div class="categories-overlay">

        <div class="container">

            <div class="row">

                <div class="col-md-10">

                    <div class="categories-title text-center">

                        <h2> Categories</h2>
                        <p>Początek traktatu czasu być uważana.
                            Dopiero możemy nazwać wszechdostatecznością.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="categories-wrapper">

            <div class="container">

                <div class="row"">

                    <div class="col-md-6" style="border-bottom: 50vh">

                        {{--Caregoties menu--}}
                        <div class="categories-list-menu">

                            <div class="list-group" id="accordion">

                                {{--<button type="button" class="list-group-item list-group-item-action active">--}}
                                {{--Cras justo odio--}}
                                {{--</button>--}}
                                @foreach($categories as $category)

                                    <button type="button" class="list-group-item list-group-item-action @if($category->id == 1)active @else collapsed @endif" data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="false" aria-controls="collapse{{$category->id}}">{{$category->name}}</button>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        {{--Categories list head--}}
                        <div class="categories-list-head">
                            @foreach($categories as $category)
                                <div class="panel-collapse @if($category->id == 1)collapse in @else collapse @endif" id="collapse{{$category->id}}" aria-expanded="false">
                                    <div class="well text-center" style="margin-bottom: 0">
                                        @foreach($category->posts->take(5) as $post)

                                            <div class="categories-list-head-image"><a href="{{url('post/'.$post->slug)}}"><img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive"></a>
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
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection



@section('footer')

    @endsection

@section('scripts')

    <script src="/js/index.js"></script>

<script>
    $(document).ready(function() {
    $('.panel-collapse').on('show.bs.collapse', function () {
    $('button.collapsed').siblings().addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
    $('button').siblings().removeClass('active');
    });
    });
//var $myGroup = $('#myGroup');
//$myGroup.on('show','.collapse', function() {
//    $myGroup.find('.collapse.in').collapse('hide');
//});

</script>
@endsection

{{--jeśli zamknięty to ma .collapsed    wtedy    trzeba zabrac .active--}}