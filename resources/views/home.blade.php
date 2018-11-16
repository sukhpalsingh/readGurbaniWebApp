<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Read Gurbani</title>

    <link href="/css/lib.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-white">
            <div class="container">
            <a class="navbar-brand" href="/">
                <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                    <a class="nav-link" href="listen">Listen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search">Search</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                </form>
            </div>
        </div>
            </nav>
    </header>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-8">
                <div class="card text-center">
                    <img class="card-img-top" src="images/gurbani_bg1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h2>
                            <a href="">Read Gurbani</a>
                        </h2>
                        <p class="card-text">Read gurbani is a healing process. Guru's teaching purify your body and soul.</p>
                        <div class="text-center text-uppercase">
                            <a href="#" class="btn btn-default btn-1">Continue reading</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-text-1 text-uppercase text-center">Recent Kirtan</h4>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/lib.min.js" type="text/javascript"></script>
  </body>
</html>
