@extends('layouts.app_technique')

@section('gauche')
  @include('technique.gauche')
@endsection
@section('content')
  <div class="tech-container">
    @foreach($items as $key => $value)
        <div class="tech-cube">
          <div class="tech-rond">
            <div class="ball">
              <img class="tech-icone" src="{{asset('public/medias/technique/')."/".$value->icone}}" alt="{{$value->nom}}" title="{{$value->nom}}">
            </div>
            <div class="tech-sousmenu">
              @foreach ($value->menu as $sousmenu)
                <a href="{{URL::route($sousmenu->lien, $key)}}">
                  <h4 class="tech-intitule">{{$sousmenu->intitule}}</h4>
                </a>
              @endforeach
            </div>
          </div>
        </div>
  @endforeach
  </div>
@endsection
