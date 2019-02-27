<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @if(null !== Auth::user() && Auth::user()->admin == 1)Antikor
      @else{{ config('app.name', 'Aver') }}
      @endif
    </title>
        <link rel="stylesheet" href="{{ asset(config('styles.parasito'))}}">

    @stack('css')

</head>
<body>
      @yield('menuprincipal')
      @yield('sousmenu')
      @yield('dashboard')
      @yield('content')
      @yield('troupeau')
      @yield('pied_de_page')
</div>

    @stack(config('scripts.path'))

    <script src="{{asset('/core/node_modules/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{ asset(config('scripts.path'))}}/parasitisme.js"></script>
</body>
</html>
