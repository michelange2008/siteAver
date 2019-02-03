@extends('layouts.app')

@section('content')
  <div class="para-container">
    <div class="para-fleche">
      <a href="{{route('parasitisme.accueil')}}">
        <div class="fleche fleche-gauche" title="Retour au menu principal"></div>
      </a>
    </div>

    <div class="carre-menu">
      <a href="{{route('parasitisme.fiches')}}"><h5>fiches</h5></a>
      <a href="{{route('parasitisme.formations')}}"><h5>formations</h5></a>
      <a href="#"><h5>liens</h5></a>
    </div>
  </div>

@endsection
