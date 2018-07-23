@section('menu')
<nav class="navbar navbar-nav navbar-dark bg-dark navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <ul class="navbar navbar-nav">

      <li class="nav-item"><a href="{{ URL::route('aver.accueil')}}" class = 'nav-link'>Accueil</a></li>

      <li class="nav-item"><a href="{{ URL::route('user.index')}}" class = 'nav-link'>Liste Eleveurs</a></li>
      
      <li class="nav-item"><a href="{{ URL::route('fevec.gestion')}}" class = 'nav-link'>Gestion Fevec</a></li>

      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle nav-link"
             role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Paramétrage des visites
          </a>
           <ul class="dropdown-menu bg-dark text-light" aria-labelledBy = "navbarDropdown">

            <a class="dropdown-item text-muted" href="{{ URL::route('visites.accueil') }}">Sommaire</a>
               
            <a class="dropdown-item text-muted" href="{{ URL::route('vetsan.changer') }}">Vét. San.</a>

            <a class="dropdown-item text-muted" href="{{ URL::route('prophylo.index') }}">Prophylaxie</a>

            <a class="dropdown-item text-muted" href="{{ URL::route('bsa.index') }}">Bilan annuel</a>

            <a class="dropdown-item text-muted" href="{{ URL::route('vso.index') }}">Visite obligatoire</a>

           </ul>
      </li>

      <li class="nav-item"><a href="{{ URL::route('user.admin')}}" class = 'nav-link'>Admin</a></li>

    </ul>
  </div>
</nav>
@endsection
