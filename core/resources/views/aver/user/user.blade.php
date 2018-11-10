@extends('layouts.app')

@section('menuprincipal')
  @include('aver.menuprincipal')
@stop

@section('sousmenu')
  @include('aver.user.sousmenuUser', ['sousmenu' => $sousmenu])
@stop

@section('content')
<div id="accordion">
@foreach($troupeauxUser as $troupeau)
<div class="d-flex flex-column">
    <div class="{{$troupeau->especes->abbreviation}}_bg card-troupeau" style="margin-bottom:10px">
        <div class="row card-cadre-simple justify-content-between align-items-center" style="margin:0">
            <div class="d-flex flex-row justify-content-center align-items-center">
              <img src="{{URL::asset(config('icones.path'))}}/ruban/{{$troupeau->especes->abbreviation}}.svg" alt="tete animal" />
              <h3 class="card-title">Troupeau {{strtolower($troupeau->especes->nom)}}</h3>
            </div>
            <div class="bouton-voir-troupeau">
              <button class="btn btn-secondary" type="button"  data-parent="#accordion"
              data-toggle="collapse" data-target="#troupeau_{{$troupeau->id}}">
                voir
              </button>
            </div>
        </div>
        @if($troupeauxUser->count() > 1) <div id="troupeau_{{$troupeau->id}}" class="collapse panneau">
        @else <div id="troupeau_{{$troupeau->id}}" class="collapse show panneau">
        @endif
          @foreach($groupeSceaux->get($troupeau->id)->listeSceaux() as $sceau)
            @if($sceau->affichage())
              <div id="{{$sceau->identite()}}" class="sceau">
                  <img src="{{URL::asset(config('fichiers.icones')).$sceau->icone()}}" alt="{{$sceau->identite()}}" />
                  <h5>{{$sceau->titre()}}
                    @if($sceau->soustitre() > 0) ({{$sceau->soustitre()}})
                    @endif
                  </h5>
                  <!-- <div class="d-flex flex-row justify-content-between"> -->
                  <div class="lien-ps-ana">
                  <p class="">{{$sceau->texte()}}</p>
                @if($sceau->soustitre() > 0)
                {{ link_to_route($sceau->bouton()->route(), ucfirst($sceau->bouton()->texte()),
                  ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $sceau->bouton()->couleur().' btn btn-sceau align-self-end'])}}
                @endif()
                </div>

              </div>
            @endif()
          @endforeach()
        </div>
    </div>
  </div>
  @endforeach()
</div>
@stop
