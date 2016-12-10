<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'P3' --}}
        @yield('title','P3')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    <header>
        <div class="row">
            <nav class="col-xs-12 col-md-12 navbar navbar-default navbar-static-top">
                <div class="container">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="http://p1.ehay.me">Project 1</a></li>
                        <li role="presentation"><a href="http://p2.ehay.me">Project 2</a></li>
                        <li role="presentation"><a href="http://p3.ehay.me">Project 3</a></li>
                        <li role="presentation"><a href="http://p4.ehay.me">Project 4</a></li>
                    </ul>
                    <div class="container">
                        <div class="navbar-header">

                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="telegram (1).png" alt="" />

                            </a>
                        </div>

                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                <li role="presentation" ><a href="{{ url('/home') }}">Home</a></li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <li role="presentation" class="links"><a href="{{ url('/login') }}">Login</a></li>
                                    <li role="presentation" class="links"><a href="{{ url('/register') }}">Register</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation"><a href="{{ url('/logout') }}" class="dropdown-menu-color">Logout</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <br>
            <br>
            <br>
        </div>
    </header>
    <div>
        <div class="row">
            <div class="col-xs-12 col-md-12 container text-center title">
                <a href="/chatroom">chatroom</a>
                <a href="/profile">profile</a>
            </div>
        </div>
        <div class="row">
            <!-- main column left -->
            <div class="col-xs-1 col-md-2"></div>
            <!-- main column center -->
            <div class="col-xs-10 col-md-8 container text-center">
                <h1 class="title">
                    p4
                </h1>
            </div>
        </div>
    </div>
    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="{{asset('../js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
