@extends('layouts.app_parasito')

@section('content')
  <div class="para-container">
    <div class="para-fleche">
      <a href="{{route('parasitisme.accueil')}}">
        <div class="fleche fleche-gauche" title="Retour au menu principal"></div>
      </a>
    </div>
    <div class="para-container-titre">
      <h1>fiches techniques (à télécharger)</h1>
    </div>
    <div class="para-container-texte ">
      <div class="para-container-fiches">
          @foreach ($fiches as $key => $value)
            <a href="{{URL::asset(config('fichiers.fiches'))."/".$value->fichier}}" title="cliquez pour afficher ou télécharger">
              <h5>{{$value->nom}}</h5>
              <img src="{{URL::asset(config('fichiers.fiches'))."/".$value->image}}" alt="">
            </a>
          @endforeach
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
      <a href="{{route('parasitisme.accueil')}}"><h2>accueil</h2></a>
      <a href="{{route('parasitisme.formations')}}" title="formations destinées aux éleveurs"><h2>formations</h2></a>
      <a href="#" title="En cours de construction"><h2>game of strongles</h2></a>
      <a href="#" title="En cours de construction"><h2>autres</h2></a>
    </div>
  </div>
  <link rel="stylesheet" href="{{ asset(config('stylesParasito.parasito'))}}">

@endsection
