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
      <div class="card {{$troupeau->especes->abbreviation}}_bg" style="width:70%">
          <div class="row  card-cadre-simple zero-marge">
            <div class="">
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
              <div class="panneau col-12 d-flex flex-row">
              <div class="sous-panneau col-6 zero-marge">
                @foreach($listeBlasons->get($troupeau->id)->blasonsListe() as $blason)
                  <div class="d-flex flex-row  justify-content-between">
                    @if($blason->affichage())
                    <div id="{{$blason->identite()}}" class="d-flex flex-row espace-sm card-cadre-simple flex-fill">
                        <img src="{{URL::asset('medias').$blason->icone()}}" title = "{{$blason->titre()}}" alt = "{{$blason->alt()}}" />
                        <div class="col-8">
                           <h5>{{$blason->titre()}}</h5>
                           <p>{{$blason->texteUser()}}</p>
                        </div>
                     </div>
                    @endif()
              </div>
              @endforeach()
            </div>
              <div class="sous-panneau col-6 zero-marge">
                @foreach($listeCards->get($troupeau->id)->cardListe() as $card)
                <div class="d-flex flex-row  justify-content-between">
                  @if($card->affichage())
                    <div id="{{$blason->identite()}}" class="d-flex flex-row espace-sm card-cadre-simple flex-fill">
                        <img src="{{URL::asset('medias').$card->icone()}}" alt="{{$card->id()}}" />
                  {{$card->titre()}}
                  {{ link_to_route($card->bouton()->route(), ucfirst($card->bouton()->texte()), ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $card->bouton()->couleur().' btn'])}}
                    </div>
                  @endif()
                </div>
                @endforeach()
            </div>
            </div>

      </div>
      <br />
    </div>
  @endforeach()
</div>

@stop
