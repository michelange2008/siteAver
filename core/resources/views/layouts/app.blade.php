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
      @foreach(config('styles') as $path)
        <link rel="stylesheet" href="{{ asset($path)}}">
      @endforeach
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    @stack('css')
    @stack('js')

</head>
<body>
  @if(Auth::user())
  <div class="d-sm-flex flex-row justify-content-start">
    <div class="col-menu">
    </div>
    @yield('menu')
    @endif
  <div class="container-fluid">
    <div class="row">
      @yield('menuprincipal')
    </div>
    <div class="col-main">
      @yield('sousmenu')
      @yield('dashboard')
      @yield('content')
      @yield('troupeau')
      @yield('pied_de_page')
    </div>
  </div>
</div>
    <script src="{{asset('/core/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/core/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/core/node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/core/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>


    <script src="{{ asset(config('scripts.path'))}}/jquery.confirm.min.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/app.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/user_gestion.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/analyses.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/psbsa.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/saisieBsaPs.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/splitAffichage.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/notes.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/antikor.js"></script>
    <script src="https://use.fontawesome.com/f8a7076b4b.js"></script>
    <!-- TODO vérifier s'il faut le téléchargement d'ajax ou si le npm suffit -->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> --}}

    @stack(config('scripts.path'))



</body>
</html>
