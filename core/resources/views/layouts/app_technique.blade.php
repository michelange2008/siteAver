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
      <link href="{{asset('public/css/technique.css')}}" rel="stylesheet">

    @stack('css')

</head>
<body>
  <div class="technique-global-container">
    @yield('gauche')
    @yield('content')
    @yield('droit')
  </div>
</div>

    @stack(config('scripts.path'))

    {{-- <script src="{{asset('/core/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset(config('scripts.path'))}}/parasitisme.js"></script> --}}
</body>
</html>
