<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Read Gurbani') }}</title>

    <link href="/css/lib.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app.min.css" rel="stylesheet" type="text/css">
    @include('layouts.analytics')
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-white">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-3 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/read">Read</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/videos">Watch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/audios">Listen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/classes">Classes</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-3 mt-lg-0 pull-right">
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body>
        <script src="/js/lib.min.js" type="text/javascript"></script>
        @yield ('content')
    </body>
</html>
