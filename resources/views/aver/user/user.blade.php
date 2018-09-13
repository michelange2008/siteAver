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
          <div class="row  card-cadre-simple row-michel">
            <div class="col-3">
              <img src="{{URL::asset('medias')}}/icones/ruban/{{$troupeau->especes->abbreviation}}.svg" alt="tete animal" />
            </div>
            <div class="col-7 d-flex flex-column justify-content-center ml-3">
              <h2 class="card-title">Troupeau</h2>

              <h2>{{$troupeau->especes->nom}}</h2>
            </div>
            <div class="col centrer">
              <img id="fleche_{{$troupeau->id}}" class="sous-ruban curseur" src="{{URL::asset('medias')}}/icones/fleche_bas.svg" alt="ouvrir"
                title="cliquer sur la flèche pour afficher le troupeau {{strtolower($troupeau->especes->nom)}}" />
            </div>
          </div>
          <div id="row_{{$troupeau->id}} " class="row row-michel espace-lg">
            <div class="panneau col-12 d-flex flex-row">
              <div class="sous-panneau col-6)">
                @foreach($listeBlasons->get($troupeau->id)->blasonsListe() as $blason)
                  <div class="d-flex flex-row  justify-content-between">
                    @if($troupeau->user->vetsan)
                    <div id="{{$blason->getIdentite()}}">
                      @if($blason->getCondition())
                        <img src="{{URL::asset('medias')}}/icones/ruban/{{$blason->getIcone_vrai()}}" title = "{{$blason->getTitre_vrai()}}" alt = "{{$blason->getAlt_vrai()}}" />
                      @else()
                        <img src="{{URL::asset('medias')}}/icones/ruban/{{$blason->getIcone_faux()}}" title = "{{$blason->getTitre_faux()}}" alt = "{{$blason->getAlt_faux()}}" />
                      @endif()
                    </div>
                    @endif()
                  <!-- @if($troupeau->user->vetsan)
                  <div id="prophylaxies" class="d-flex flex-row  justify-content-between">
                    <p>Prophylaxies en {{$campagne}}</p>
                    @if(count($troupeau->anneeprophylos) > 0 && $troupeau->anneeprophylos->first()->campagne === $campagne)
                      OUI
                    @else
                      NON
                    @endif()
                </div>
                <div id="vso" class="d-flex flex-row justify-content-between">
                  <p>VSO en {{$annee->year}}</p>
                  @if(count($troupeau->vsoafaire) > 0 && $troupeau->vsoafaire->sortBy('annee')->first()->annee === $annee->year)
                    OUI
                  @else
                    NON
                  @endif()
                </div>
                @endif()
                <div id="bsa" class="d-flex flex-row  justify-content-between">
                  <p>Dernier bilan sanitaire</p>
                  {{Carbon\Carbon::createFromFormat('Y-m-d', $troupeau->bsas->sortByDesc('date_bsa')->first()->date_bsa)->formatLocalized('%e %B %Y')}}
                </div> -->
              </div>
              @endforeach()
            </div>
              <div class="sous-panneau col-6">
                @foreach($listeCards->get($troupeau->id)->cardListe() as $card)
                <div>
                  @if($card->affichage())
                  {{$card->titre()}}
                  {{ link_to_route($card->bouton()->route(), ucfirst($card->bouton()->texte()), ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $card->bouton()->couleur().' btn'])}}

                  @endif()
                </div>
                @endforeach()
            </div>
            </div>

        </div>
      </div>
      <br />
    </div>
  @endforeach()
</div>

@stop
