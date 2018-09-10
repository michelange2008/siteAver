@section('menu')
<nav class="navbar navbar-nav navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">
    <ul class="navbar navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Troupeaux
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(isset($troupeaux))
            @foreach($troupeaux as $troupeau)
              <a class="dropdown-item" href="/public/aver/troupeau/{{ $troupeau->id }}">
                {{ $troupeau->especes['nom'] }}
              </a>
            @endforeach
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-light bg-success" href="/public/aver/troupeau">Gestion des troupeaux</a>
            @else
              <a class="dropdown-item text-light bg-success" href="/public/aver/troupeau/create">Créer un troupeau</a>
            @endif
          </div>
     </li>
      <li class="nav-item"><a class="nav-link" href="medoc">Consommation de médicaments</a></li>
    </ul>
  </div>
</nav>
@endsection
