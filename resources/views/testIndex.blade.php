@extends('layout')

@section('title', '| Homepage')

@section('content')

    {{--header--}}
    <header class="header">

        <div class="header-overlay">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        {{--logo--}}
                        <div class="logo text-center">

                            <img src="img/logo1.png" alt="logo">
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-8">

                        <div class="header-text">

                            {{--title & destripction--}}
                            <h1>Blog for everybody who loves art</h1>
                            <p> Built with great love! </p>

                        </div>

                        <div class="header-btns">

                            {{--header buttons--}}
                            <a class="btn btn-make-account" href="#"> Make a New Account </a>
                            <a class="btn btn-tour" href="#"> Take a Tour and See Our Posts
                                <i class="fa fa-angle-down"></i>
                            </a>


                        </div>

                    </div>
                        {{--extra image on the right--}}
                    <div class="col-md-4">

                        <div class="header-extra-img">
                            <img src="">
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </header>

    {{--Testimonials--}}
    <section class="testimonial">

        <div class="testimonial-overlay">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">

                            {{--indicators--}}
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-testimonial" data-slide-to="1"></li>
                                <li data-target="#carousel-testimonial" data-slide-to="2"></li>
                            </ol>

                            {{--wrapper for slides--}}
                            <div class="carousel-inner">

                                {{--item 1--}}
                                <div class="item active text center">

                                    <img src="images/Rembrandt i ja_oraz ty i ona_sONWex.jpg" alt="" class="center-block">

                                    <div class="testimonial-caption">

                                        <h2>Name of somebody1</h2>
                                        <h4><span>his job 1</span> in company 1</h4>
                                        <p>Litwo! Ojczyzno moja! Ty jesteś jak zdrowie. Ile cię trzeba cenić,
                                        ten tylko widział swych domysłów tysiące kroków zamek dziś toczy się w gościnę zaprasza.
                                        </p>
                                    </div>

                                </div>

                                {{--item 2--}}
                                <div class="item active text center">

                                    <img src="images/2323232323_2323232323_yRwCtU.jpg" alt="" class="center-block">

                                    <div class="testimonial-caption">

                                        <h2>Name of somebody2</h2>
                                        <h4><span>his job 2</span> in company 2</h4>
                                        <p>Tymczasem na tyle nauki lękał się, wleciała przez to mówiąc,że mi w którym
                                            świecą gęste kutasy jak przystało drugich wiek, urodzenie, cnoty, obyczaje chowa i książki.
                                        </p>
                                    </div>

                                </div>

                                {{--item 3--}}
                                <div class="item active text center">

                                    <img src="images/2323232323_2323232323_yRwCtU.jpg" alt="" class="center-block">

                                    <div class="testimonial-caption">

                                        <h2>Name of somebody3</h2>
                                        <h4><span>his job 3</span> in company 3</h4>
                                        <p>Uczepiwszy falbaną o nim: ma dotąd pierwsze zamiary
                                            odmienił kazał, aby w różne gazety głoszących nowe o tym.
                                        </p>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



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