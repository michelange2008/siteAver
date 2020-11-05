<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
      @if(null !== Auth::user() && Auth::user()->admin == 1)Antikor
      @else{{ config('app.name', 'Aver') }}
      @endif
    </title>
    @foreach(config('styles') as $path)
      <link rel="stylesheet" href="{{ asset($path)}}">
    @endforeach
    @stack('css')
    @stack('js')

  </head>
  <body>

    @yield('content')

  </body>

</html>
