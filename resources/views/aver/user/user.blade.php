@extends('layouts.app')

@section('menuprincipal')
  @include('aver.menuprincipal')
@stop

@section('sousmenu')
  @include('aver.user.sousmenuUser', ['sousmenu' => $sousmenu])
@stop

@section('content')

<div class="container-fluid d-flex flex-column">
  @foreach($troupeauxUser as $troupeau)
    <div class="container-fluid">
      <div class="card" style="width:50%">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <img src="{{URL::asset('medias')}}/icones/ruban/{{$troupeau->especes->abbreviation}}.svg" alt="tete animal" />
            </div>
            <div class="col-7 d-flex flex-column justify-content-center ml-3">
              <h2 class="card-title">Troupeau</h2>
              <h2>{{$troupeau->especes->nom}}</h2>
            </div>
            <div class="col">
              <img id="fleche_{{$troupeau->id}}" class="sous-ruban curseur" src="{{URL::asset('medias')}}/icones/fleche_bas.svg" alt="ouvrir"
                title="cliquer sur la flèche pour afficher le troupeau {{strtolower($troupeau->especes->nom)}}" />
            </div>
          </div>
          <div id="row_{{$troupeau->id}} "class="row">
            <div class="card-subtitle">
              @if($troupeau->user->vetsan)
              <div id="prophylaxies">
                <p>Prophylaxies en {{$campagne}}</p>
                @if(count($troupeau->anneeprophylos) > 0 && $troupeau->anneeprophylos->first()->campagne === $campagne)
                  OUI
                @else
                  NON
                @endif()
            </div>
            <div id="vso">
              <p>VSO en {{$annee->year}}</p>
              @if(count($troupeau->vsoafaire) > 0 && $troupeau->vsoafaire->sortBy('annee')->first()->annee === $annee->year)
                OUI
              @else
                NON
              @endif()
            </div>
            @endif()
            <div id="bsa">
              
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach()
</div>

@stop
