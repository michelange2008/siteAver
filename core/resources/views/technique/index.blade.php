@extends('layouts.app')
@push('css')
  <link href="{{asset('public/css/technique/technique.css')}}" rel="stylesheet">
@endpush
@section('content')
  <div class="tech-container">
    @foreach($items as $value)
      {{-- <div class="tech-souscontainer"> --}}
        <div class="tech-cube">
          <div class="tech-rond">
            <div class="ball">
              <img src="{{asset('public/medias/technique/')."/".$value->icone}}" alt="{{$value->nom}}" title="{{$value->nom}}">
            </div>
            <div class="tech-sousmenu">
              @foreach ($value->menu as $sousmenu)
                <h4 class="tech-intitule">{{$sousmenu->intitule}}</h4>
              @endforeach
            </div>
          </div>
        </div>
    {{-- </div> --}}
  @endforeach
  </div>
@endsection
