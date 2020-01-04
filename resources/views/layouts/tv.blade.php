<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Read Gurbani') }}</title>

    @include('layouts.styles')
  </head>
  <body class="tv">
    <nav class="navbar navbar-white">
        <div class="container-fluid d-block p-0">
            <img src="images/logo.png" style="height: 60px;" class="float-left" />
            <div class="h3 font-weight-bold pt-2 pl-2 float-left">Gurbani</div>
        </div>
    </nav>
    @include('layouts.scripts')
    @yield ('content')
</html>
