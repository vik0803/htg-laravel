<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>@yield('title')</title>



    <!-- custom theme css -->
    <link href="/css/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap-social.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">HTG: Starter</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                <li><a href="{{ URL::route('auth_login') }}" title="Log In">Log in</a> </li>
                <li><a href="{{ URL::route('auth_register') }}" title="Register">Register</a></li>
                @else
                <li><a href="{{ URL::route('dashboard_home') }}" title="Dashboard">Dashboard</a></li>
                @if (Auth::User()->hasRole(['root', 'administrator']))

                <li><a href="{{ URL::route('admin::dashboard') }}" title="Admin">Admin</a></li>
                    @endif;

                <li><a href="{{ URL::route('auth_logout') }}" title="Logout">Logout</a></li>
                {{--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                --}}
                @endif
            </ul>

            @if (isset(Auth::user()->avatar))
            <ul class="nav navbar-nav navbar-right">
                <li><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="50" height="50"></li>
            </ul>
            @endif
        </div>
    </div>
</nav>

{{-- Begin page content --}}
<div class="container">
    <div class="page-header">
        <h1>@yield('page_header')</h1>
        <hr>
    </div>
    @yield('content')
</div>
{{-- end page content --}}

<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; {{ date('Y') }} Andrew McCombe</p>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
