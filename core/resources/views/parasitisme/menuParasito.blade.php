@section('menu')
<nav class=" navbar navbar-nav navbar-dark bg-dark navbar-expand-sm menu" role="navigation">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="nav navbar-nav">

      <li class="nav-item"><a href="{{ URL::route('parasitisme.accueil')}}" class = 'nav-link'>Sommaire</a></li>

      <li class="nav-item"><a href = "{{URL::route('parasitisme.fiches')}}"class="nav-link">Fiches</a></li>

      <li class="nav-item"><a href="{{URL::route('parasitisme.formations')}}" class="nav-link">Formations</a></li>

      <li class="nav-item"><div class="dropdown-divider"></div></li>

      <li class="nav-item"><a href="{{URL::route('accueil')}}" class="nav-link">Accueil général</a></li>

    </ul>
  </div>
</nav>
@endsection
