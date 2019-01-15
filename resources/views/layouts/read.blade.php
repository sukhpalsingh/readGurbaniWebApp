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
        <script src="/js/lib.min.js" type="text/javascript"></script>
        <header>
            <nav class="navbar navbar-expand-lg navbar-white">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
                    </a>
                    <div class="col-md-4 col-sm-7">
                        <div class="input-group">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text"><i class="fas fa-cog"></i></a>
                            </div>
                            <input
                                id="search-keyword"
                                type="text"
                                class="form-control input-sm punjabi-font-1"
                                placeholder=""
                                value=""
                                autocomplete="off"
                            >
                            <div class="input-group-append">
                                <a href="javascript: search.list()" class="input-group-text"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-3 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/sundar-gutka"><i class="fas fa-bookmark"></i> Sundar Gutka</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript: pothis.list()"><i class="fas fa-book"></i> Pothi Sahib</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')
    </body>
</html>
