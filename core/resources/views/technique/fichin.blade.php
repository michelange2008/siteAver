@extends('layouts.app_parasito')

@section('content')
  <div class="tech-container">
    <div class="tech-container-titre">
      <h1>{{ucfirst($theme->nom)}}</h1>
    </div>
    <div class="tech-container-texte ">
      <div class="tech-container-img">
        <img src="{{URL::asset(config('fichiers.technique'))."/".$theme->icone}}" alt="">
      </div>
      <div class="tech-container-fiches">
        @if($theme->nom === "toutes les fiches")
          @foreach ($themes as $valeur)
            <div class="tech-theme-titre">
              <h2>{{$valeur}}</h4>
            </div>
            <div class="tech-theme-fiche">
              @foreach ($fiches as $value)
                @if ($value->categorie === $valeur)
                  <a href="{{URL::asset(config('fichiers.fiches'))."/".$value->fichier}}" title="cliquez pour afficher ou télécharger">
                    <h5>{{$value->nom}}</h5>
                    <img src="{{URL::asset(config('fichiers.fiches'))."/".$value->image}}" alt="">
                  </a>
                @endif
              @endforeach
            </div>
          @endforeach
        @else
          @foreach ($fiches as $value)
            @if ($value->categorie === $theme->nom)
              <a href="{{URL::asset(config('fichiers.fiches'))."/".$value->fichier}}" title="cliquez pour afficher ou télécharger">
                <h5>{{$value->nom}}</h5>
                <img src="{{URL::asset(config('fichiers.fiches'))."/".$value->image}}" alt="">
              </a>
            @endif
          @endforeach
        @endif
      </div>
    </div>
    <div id="tech-menu" class="tech-menu">
      <div class="fermer" title="fermer la fenêtre de menu"></div>
      <div class="carre"></div>
      <div class="carre-titre">
        <h4>menu</h4>
        <div class="fleche-bas"></div>
      </div>
      <div class="carre-menu">
        @foreach ($menu as $item)
          <a href="{{route($item->lien)}}"><h2>{{$item->intitule}}</h2></a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
