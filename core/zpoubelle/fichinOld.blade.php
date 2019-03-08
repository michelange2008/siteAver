<div class="tech-fichin">
  <div class="tech-titre">
    <h1>{{$categorie}}<span> (fiches à télécharger)</span></h1>
  </div>
  <div class="tech-container-texte ">
    <div class="tech-container-fiches">
        @foreach ($fiches as $value)
          @if ($value->categorie === $categorie)
            <a href="{{URL::asset(config('fichiers.fiches'))."/".$value->fichier}}" title="cliquez pour afficher ou télécharger">
              <h5>{{$value->nom}}</h5>
              <img src="{{URL::asset(config('fichiers.fiches'))."/".$value->image}}" alt="">
            </a>
          @endif
        @endforeach
    </div>
  </div>
</div>
