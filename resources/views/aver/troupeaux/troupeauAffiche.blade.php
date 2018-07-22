@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
  <div class="container-fluid bg bg-secondary d-flex justify-content-between espace-lg espace-bas">
    <div id="img-especes" class="barre-item">
      <img src="{{URL::asset('medias')}}/icones/{{$troupeau->especes->abbreviation}}.svg"  alt="{{$troupeau->especes->nom}}" />
    </div>
    <div id="entete" class="ligne-entete text-light">
      <div id="barre-titre" class="barre-item">
        <h3 class="titre">{{$troupeau->user->name}}</h3>
        <h4>{{$troupeau->especes->nom}}</h4>
        <h5>{{$troupeau->user->ede}}</h5>
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
    </div>
  </div>
@endsection()
