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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-flash-1.5.1/fh-3.1.3/r-2.2.1/rg-1.0.2/datatables.min.css"/>
 
    <link href="{{ asset('css/perso.css') }}" rel="stylesheet">
    <!-- jquery-confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-nav navbar-expand-lg navbar-light bg-light navbar-static-top">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Antikor') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuAver" aria-controls="menuAver" aria-expanded="false" aria-label="Toggle-navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse menu-on-right" id="menuAver">
          <ul class="nav navbar-nav navbar-left">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
                  @else
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" id="utilisateur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              {{ Auth::user()->name }}
                              @if(Auth::user()->admin == 1) (admin.)
                              @endif
                          </a>

                          <div class="dropdown-menu" aria-labelledby="utilisateur">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Déconnection
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
          </ul>
        </div>
        </div>
      </nav>
    </div>
        @yield('menu')
        @yield('sousmenu')
        @yield('dashboard')
        @yield('content')
        @yield('troupeau')
        @yield('pied_de_page')
    </div>

   <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/user_gestion.js')}}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('js/splitAffichage.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-flash-1.5.1/fh-3.1.3/r-2.2.1/rg-1.0.2/datatables.min.js"></script>
    <script src="https://use.fontawesome.com/f8a7076b4b.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>   
    




</body>
</html>
