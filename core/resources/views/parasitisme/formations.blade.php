@extends('layouts.app_parasito')

@section('content')
  <div class="para-container">
    <div class="para-fleche">
      <a href="{{route('parasitisme.accueil')}}">
        <div class="fleche fleche-gauche" title="Retour au menu principal"></div>
      </a>
    </div>
    <div class="para-container-titre">
      <h1>formations à destination des éleveurs</h1>
    </div>
    <div class="para-container-texte ">
      <div class="para-container-formations">
        <h5>Programme 2019-2020 en cours d'élaboration</h5>
        <img src="{{URL::asset(config('fichiers.parasitisme'))}}/wip.svg" alt="">
      </div>
    </div>
    <div class="para-fleche">
        <div id="fleche-droite" class="fleche fleche-droite" title="Menu"></div>
    </div>
  </div>
  <div id="para-menu" class="para-menu">
    <div class="fermer" title="fermer la fenêtre de menu"></div>
    <div class="carre"></div>
    <div class="carre-titre">
      <h4>menu</h4>
      <div class="fleche-bas"></div>
    </div>
    <div class="carre-menu">
      <a href="{{route('parasitisme.accueil')}}" title="fiches techniques à télécharger"><h2>accueil</h2></a>
      <a href="{{route('parasitisme.fiches')}}" title="formations sur le parasitisme destinées aux éleveurs"><h2>fiches</h2></a>
      <a href="#" title="En cours de construction"><h2>game of strongles</h2></a>
      <a href="#" title="En cours de construction"><h2>autres</h2></a>
    </div>
  </div>
  <link rel="stylesheet" href="{{ asset(config('stylesParasito.parasito'))}}">

@endsection
