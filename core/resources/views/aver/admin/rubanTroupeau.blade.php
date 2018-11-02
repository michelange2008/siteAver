@section('dashboard')
  <div class="ruban-barre container-fluid bg bg-secondary espace-lg espace-bas">
    <div id="retour" class=" ">
      <a href="{{URL::route('home')}}" title="revenir à la liste des éleveurs">
        <img src="{{URL::asset(config('fichiers.icones'))}}/retour.svg" alt="retour"  />
      </a>
    </div>

    <div id="img-especes" class="barre-item d-flex flex-row align-items-end" title="troupeau {{$troupeau->especes->nom}}">
      <img src="{{URL::asset(config('fichiers.icones'))}}/ruban/{{$troupeau->especes->abbreviation}}.svg"  alt="{{$troupeau->especes->nom}}" />
      @if($autreTroupeaux !== null)
      <!-- Prévoit le cas où l'éleveur à plusieurs troupeaux -->
        @foreach($autreTroupeaux as $autreTroupeau)
        <a  class="img-petite" href="{{route('troupeau.accueil', ['id' => $autreTroupeau->id])}}" title="Afficher le troupeau {{strtolower($autreTroupeau->especes->nom)}}">
          <img class="img-normale" src="{{URL::asset(config('fichiers.icones'))}}/ruban/{{$autreTroupeau->especes->abbreviation}}.svg"  alt="{{$autreTroupeau->especes->nom}}" />
        </a>
        @endforeach()
      @endif()
    </div>

    <div id="entete" class="ligne-entete text-light">
      {{-- <div id="barre-titre" class="barre-item"> --}}
        <h3 class="titre">{{$troupeau->user->name}}</h3>
        <h4 class= "{{$troupeau->especes->abbreviation}}" style="text-shadow: 1px 1px black">{{$troupeau->especes->nom}}</h4>
        <h5>EDE {{$troupeau->user->ede}} - UIV&nbsp{{$troupeau->uiv}}</h5>
      {{-- </div> --}}
    </div>

    <div id="barre-synthese" class="d-flex flex-row justify-content-between">
      @foreach($listeSceaux->listeSceaux() as $sceau)
      @if($sceau->affichage() && $sceau->type() === App\Constantes\ConstSceaux::TYPE_INFO)
        {{-- <div id="{{$sceau->identite()}}" class="barre-item"> --}}
            <img src="{{URL::asset(config('fichiers.icones')).$sceau->icone()}}" title = "{{$sceau->titre()}}" alt = "{{$sceau->identite()}}" />
        {{-- </div> --}}
      @endif()
      @endforeach()
      @if(Auth::user()->admin)
      <a href="{{route('troupeau.paramAdmin', ['id' => $troupeau->id] )}}">
        <img src="{{URL::asset(config('fichiers.icones'))}}/ruban/parametres.svg" alt="modifier" title="Modifier les paramètres de cet éleveur" />
      </a>
      @endif()
    </div>
  </div>
@endsection()
