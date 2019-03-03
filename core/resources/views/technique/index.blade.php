@extends('layouts.app_technique')

@section('gauche')
  @include('technique.gauche')
@endsection
@section('content')
  <div class="tech-container-boules">
    @foreach($items as $key => $value)
        <div class="tech-cube">
          <div class="tech-autour">
            <div class="tech-rond">
              <div id="ball_{{$key}}" class="ball">
                <img class="tech-icone" src="{{asset('public/medias/technique/')."/".$value->icone}}" alt="{{$value->nom}}" title="{{$value->nom}}">
              </div>
            </div>
          </div>
          <div id="sousmenu_{{$key}}" class="tech-sousmenu">
            <div class="tech-theme">
              <h1>{{ucfirst($value->nom)}}</h1>
            </div>
            @foreach ($value->menu as $sousmenu)
              <a href="{{URL::route($sousmenu->lien, $key)}}">
                <h4 class="tech-intitule">{{ucfirst($sousmenu->intitule)}}</h4>
              </a>
            @endforeach
          </div>
        </div>
  @endforeach
  </div>
@endsection
@section('droite')

@endsection
