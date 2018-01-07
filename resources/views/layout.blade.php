<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marcin Dyszkiewicz">

    <title>Art Blog @yield('title')</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/parsley.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
@include('partials._navBar')
    <section id="showcase" class="col-md-8 col-md-offset-2" >
        <div class="container">
            <h1>Art Blog</h1>
        </div>
    </section>


@if(Auth::check())
    Logged as User
@elseif(Auth::guard('admin'))
    Logged as Admin
@else
    Logged Out
@endif
{{--{{ Auth::check() ? "Logged as User" : "Logged Out"}}--}}

{{--<p>{{ Auth::guard('admin') ? "Logged as Admin" : ""}}</p>--}}

@yield('content')


@include('partials._messages')

@yield('scripts')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

@yield('footer')
<footer>
    <p>Marcin Dyszkiewicz Web Developer, Copyright &copy; 2017-2018 </p>
</footer>
</body>
</html>