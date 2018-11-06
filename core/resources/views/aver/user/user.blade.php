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
    <div class="container-fluid {{$troupeau->especes->abbreviation}}_bg card-troupeau" style="margin-bottom:10px">
        <div class="row  card-cadre-simple">
            <div class="">
              <img src="{{URL::asset(config('icones.path'))}}/ruban/{{$troupeau->especes->abbreviation}}.svg" alt="tete animal" />
            </div>
            <div class="col-7 d-flex flex-column justify-content-center ml-3">
              <h2 class="card-title">Troupeau</h2>
              <h2>{{$troupeau->especes->nom}}</h2>
            </div>
        </div>
        <div class="container-fluid">
              <div class="row panneau justify-content-between">
                @foreach($groupeSceaux->get($troupeau->id)->listeSceaux() as $sceau)
                  @if($sceau->affichage())
                    <div id="{{$sceau->identite()}}" class="sceau col-6 d-flex flex-row espace-sm mini-card card-cadre-simple justify-content-start">
                        <img src="{{URL::asset('medias').$sceau->icone()}}" alt="{{$sceau->identite()}}" />
                        <div class="mini-card">
                          <h5>{{$sceau->titre()}}</h5>
                          <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-column">
                              @if(!is_null($sceau->soustitre()))
                                <h6 class="smartphone-no">{{$sceau->soustitre()}}</h6>
                              @endif()
                              <p class="smartphone-no">{{$sceau->texte()}}</p>
                          </div>
                          <div>
                            @if($sceau->parametre() > 0)
                            {{ link_to_route($sceau->bouton()->route(), ucfirst($sceau->bouton()->texte()),
                              ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $sceau->bouton()->couleur().' btn btn-sceau align-self-end'])}}
                              @endif()
                          </div>
                        </div>
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
