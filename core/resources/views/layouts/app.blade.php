<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aver') }}</title>
     <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset(config('styles.app'))}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/b-flash-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /> -->
    <!-- jquery-confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    @stack('css')

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      @yield('menuprincipal')
    </div>
    <div class="row">
        <div class="col-md-2" style="background:#343a40; padding:0;">
          @yield('menu')
        </div>
        <div class="col-md-10 ">
          @yield('sousmenu')
          @yield('dashboard')
          @yield('content')
          @yield('troupeau')
          @yield('pied_de_page')
        </div>
    </div>
</div>
   <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/app.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/user_gestion.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/analyses.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/psbsa.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/bootstrap/bootstrap.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/splitAffichage.js"></script>
    <script src="https://use.fontawesome.com/f8a7076b4b.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    @stack(config('scripts.path'))



</body>
</html>
