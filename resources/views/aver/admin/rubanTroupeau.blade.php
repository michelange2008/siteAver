@section('dashboard')
  <div class="container-fluid bg bg-secondary d-flex justify-content-between espace-lg espace-bas">
    <div id="img-especes" class="barre-item d-flex flex-row align-items-end">
      <a href="{{route('home')}}">
        <img src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" title="revenir à la liste des éleveurs" />
      </a>
      <img src="{{URL::asset('medias')}}/icones/{{$troupeau->especes->abbreviation}}.svg"  alt="{{$troupeau->especes->nom}}" />
      @if($autreTroupeaux !== null)
        @foreach($autreTroupeaux as $autreTroupeau)
        <a  class="img-petite" href="{{route('troupeau.accueil', ['id' => $autreTroupeau->id])}}" title="Afficher le troupeau {{strtolower($autreTroupeau->especes->nom)}}">
          <img class="img-normale" src="{{URL::asset('medias')}}/icones/{{$autreTroupeau->especes->abbreviation}}.svg"  alt="{{$autreTroupeau->especes->nom}}" />
        </a>
        @endforeach()
      @endif()
    </div>
    <div id="entete" class="ligne-entete text-light">
      <div id="barre-titre" class="barre-item">
        <h3 class="titre">{{$troupeau->user->name}}</h3>
        <h4 class= "{{$troupeau->especes->abbreviation}}" style="text-shadow: 1px 1px black">{{$troupeau->especes->nom}}</h4>
        <h5>EDE {{$troupeau->user->ede}} - UIV {{$troupeau->uiv}}</h5>
      </div>
    </div>
    <div id="barre-synthese" class="d-flex flex-row justify-content-between">
      @foreach($listeBlasons->blasonsListe() as $blason)
        <div id="{{$blason->getIdentite()}}" class="barre-item">
          @if($blason->getCondition())
            <img src="{{URL::asset('medias')}}/icones/{{$blason->getIcone_vrai()}}" title = "{{$blason->getTitre_vrai()}}" alt = "{{$blason->getAlt_vrai()}}" />
          @else()
            <img src="{{URL::asset('medias')}}/icones/{{$blason->getIcone_faux()}}" title = "{{$blason->getTitre_faux()}}" alt = "{{$blason->getAlt_faux()}}" />
          @endif()
        </div>
      @endforeach()
      @if($admin)
      <a href="{{route('troupeau.paramAdmin', ['id' => $troupeau->id] )}}">
        <img src="{{URL::asset('medias')}}/icones/parametres.svg" alt="modifier" title="Modifier les paramètres de cet éleveur" />
      </a>
      @endif()
    </div>
  </div>
@endsection()
