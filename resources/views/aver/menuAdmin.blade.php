@section('menu')
<nav class="navbar navbar-nav navbar-dark bg-dark navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <ul class="navbar navbar-nav">

      <li class="nav-item"><a href="{{ URL::route('fevec.index')}}" class = 'nav-link']>Accueil</a></li>

      <li class="nav-item"><a href="{{ URL::route('fevec.gestion')}}" class = 'nav-link']>Gestion Fevec</a></li>

      <li class="nav-item"><a href="{{ URL::route('user.index')}}" class = 'nav-link']>Liste Eleveurs</a></li>

      <li class="nav-item"><a href="{{ URL::route('user.admin')}}" class = 'nav-link']>Admin</a></li>

    </ul>
  </div>
</nav>
@endsection
