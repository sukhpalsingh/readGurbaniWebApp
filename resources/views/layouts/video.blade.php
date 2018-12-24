<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Read Gurbani - Watch Gurbani Kirtan</title>

    <link href="/css/lib.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app.min.css" rel="stylesheet" type="text/css">
    @include('layouts.analytics')
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-white">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <div class="navbar-nav mr-auto mt-3 mt-lg-0 col-sm-6">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="q">
                                <div class="input-group-btn">
                                    <input type="submit" class="btn btn-default" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav mt-3 mt-lg-0 pull-right">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
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
