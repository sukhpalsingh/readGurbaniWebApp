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
        @yield ('layout')
    </body>
</html>
