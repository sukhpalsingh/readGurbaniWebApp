<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Read Gurbani - Watch Gurbani Kirtan</title>

    @include('layouts.styles')
    @include('layouts.analytics')
  </head>
  <body>
        @include('layouts.scripts')
        <header>
            <nav class="navbar navbar-expand-lg navbar-white">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="/images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/read"><i class="fas fa-search"></i> Search</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/sundar-gutka"><i class="fas fa-bookmark"></i> Sundar Gutka</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pothis"><i class="fas fa-book"></i> Pothi Sahib</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript: settings.show()" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div id="settings" class="position-absolute top-0 d-none">
            <div class="card m-0 p-0">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold mb-3">Settings</h5>
                    <table class="table table-striped">
                        <tr>
                            <td>
                                <h5 class="card-title">Gurmukhi</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('gurmukhi');">
                                                    <i class="fas fa-minus-square"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" value="" id="gurmukhi-font-size-setting">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('gurmukhi');">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5 class="card-title">Teeka</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-check">     
                                            <div class="custom-control custom-switch mt-2">
                                                <input type="checkbox" class="custom-control-input" id="teeka-display-setting" onchange="settings.toggleDisplay('teeka');">
                                                <label class="custom-control-label" for="teeka-display-setting"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('teeka');">
                                                    <i class="fas fa-minus-square"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" value="" id="teeka-font-size-setting">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('teeka');">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5 class="card-title">Translation</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-check">     
                                            <div class="custom-control custom-switch mt-2">
                                                <input type="checkbox" class="custom-control-input" id="english-display-setting" onchange="settings.toggleDisplay('english');">
                                                <label class="custom-control-label" for="english-display-setting"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('english');">
                                                    <i class="fas fa-minus-square"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" value="" id="english-font-size-setting">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('english');">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <input type="button" class="button btn-danger btn-sm" value="Reset" onclick="settings.reset()">
                    <input type="button" class="button btn-success btn-sm" value="Close" onclick="settings.show()">
                </div>
            </div>
        </div>

        @yield('content')
    </body>
</html>
