@if(Auth()->user()->admin === 1)
@section('menu')
<nav class=" navbar navbar-nav navbar-dark bg-dark navbar-expand-sm menu" role="navigation">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="nav navbar-nav">

      <li class="nav-item"><a href="{{ URL::route('aver.accueil')}}" class = 'nav-link'>Accueil</a></li>

      <li class="nav-item"><a href = "{{URL::route('admin.analyses')}}"class="nav-link">Analyses</a></li>

      <li class="nav-item"><a href="{{URL::route('bsa.saisie')}}" class="nav-link">BSA et PS</a></li>

      <li class="nav-item"><a href="{{ URL::route('user.index')}}" class = 'nav-link'>Liste Eleveurs</a></li>

      <li class="nav-item dropdown smartphone-no">
          <a id="visitesDropdown" class="nav-link dropdown-toggle nav-link" data-toggle="dropdown">
            Param visites
          </a>
          <ul class="dropdown-menu bg-dark text-light" aria-labelledBy = "visitesDropdown">

            <li><a class="dropdown-item" href="{{ URL::route('visites.accueil') }}">Sommaire</a></li>

            <li><a class="dropdown-item" href="{{ URL::route('vetsan.changer') }}">Vét. San.</a></li>

            <li><a class="dropdown-item" href="{{ URL::route('prophylo.index') }}">Prophylaxie</a></li>

            <li><a class="dropdown-item" href="{{ URL::route('bsa.index') }}">Bilan annuel</a></li>

            <li><a class="dropdown-item" href="{{ URL::route('ps.index') }}">Protocoles de soin</a></li>

            <li><a class="dropdown-item" href="{{ URL::route('vso.index') }}">Visite obligatoire</a></li>

           </ul>
      </li>

      <li class="nav-item dropdown smartphone-no">
        <a id="adminDropDown" class="nav-link dropdown-toggle nav-link" data-toggle="dropdown">
          Administration
        </a>
        <ul class="dropdown-menu bg-dark text-light" aria-labelledBy = "adminDropdown">

          <li>
            <a  class = 'dropdown-item' href="{{ URL::route('fevec.gestion')}}">Gestion Fevec</a></li>
          </li>


          <!-- <a  class = 'dropdown-item'  href="{{ URL::route('user.admin')}}">Admin</a> -->

        </ul>
      </li>
    </ul>
  </div>
</nav>
@endsection
@endif()
