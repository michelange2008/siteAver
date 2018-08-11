@section('menu')
<nav class="navbar navbar-nav navbar-dark bg-dark navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <ul class="navbar navbar-nav">

      <li class="nav-item"><a href="{{ URL::route('aver.accueil')}}" class = 'nav-link'>Accueil</a></li>

      <li class="nav-item"><a href = "{{URL::route('admin.analyses')}}"class="nav-link">Analyses</a></li>

      <li class="nav-item"><a href="{{URL::route('bsa.saisie')}}" class="nav-link">BSA et PS</a></li>

      <li class="nav-item"><a href="{{ URL::route('user.index')}}" class = 'nav-link'>Liste Eleveurs</a></li>


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

            <a class="dropdown-item text-muted" href="{{ URL::route('ps.index') }}">Protocoles de soin</a>

            <a class="dropdown-item text-muted" href="{{ URL::route('vso.index') }}">Visite obligatoire</a>

           </ul>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle nav-link"
           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administration
        </a>
        <ul class="dropdown-menu bg-dark text-light" aria-labelledBy = "navbarDropdown">

          <a  class = 'dropdown-item text-muted' href="{{ URL::route('fevec.gestion')}}">Gestion Fevec</a></li>

          <!-- <a  class = 'dropdown-item text-muted'  href="{{ URL::route('user.admin')}}">Admin</a> -->

        </ul>
      </li>
    </ul>
  </div>
</nav>
@endsection
