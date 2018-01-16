<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marcin Dyszkiewicz">

    <title>Art Blog @yield('title')</title>

    {{--Fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500i,600,700,700i,800,900|Source+Sans+Pro:300,300i,400,400i,600i,700,900" rel="stylesheet">

    <!-- Bootstrap & CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/parsley.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
@include('partials._navBar')

{{--@yield('header')--}}
{{-------header----------}}
<header class="header" style="{{Request::is('/') ? "height: 100vh; box-sizing:border-box;" : ""}}">

    <div class="header-overlay" style="{{Request::is('/') ? "height: 100vh; box-sizing:border-box;" : ""}}">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    logo
                    <div class="logo text-center">

                        <img src="{{asset('/img/logo1.png')}}" alt="logo" class="img-responsive">
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
                    @yield('header-button')
                    {{--<div class="header-btns">--}}

                        {{--header buttons--}}
                        {{--<a class="btn btn-make-account" href="#"> Make a New Account </a>--}}
                        {{--<a class="btn btn-tour" href="#"> Take a Tour and See Our Posts--}}
                            {{--<i class="fa fa-angle-down"></i>--}}
                        {{--</a>--}}

                    {{--</div>--}}

                </div>

            </div>

        </div>

    </div>


</header>



@yield('content')


@include('partials._messages')


@yield('footer')
<footer class="footer">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="copyright">
                    <p><a href="#">Marcin Dyszkiewicz Web Developer</a>, Copyright &copy; 2017-2018</p>
                </div>
            </div>
            {{--<div class="col-md-6">--}}
                {{--<div class="scroll-top">--}}
                    {{--<a href="#"><i class="fa fa-angle-up"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

@yield('scripts')


</body>
</html>