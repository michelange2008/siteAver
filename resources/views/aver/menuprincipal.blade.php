@section('menuprincipal')
<div id="app">
  <nav class="navbar navbar-nav navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container-fluid">
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
</div>
<br />
@endsection()
