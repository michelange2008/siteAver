@extends('layouts.app')
@push('css')
@endpush
<link href="{{asset('public/css/technique/technique.css')}}" rel="stylesheet">
@section('content')
  <div class="tech-container">
    @foreach($items as $value)
    <div class="tech-rond">
      <img src="{{asset('public/medias/technique/')."/".$value->icone}}" alt="{{$value->nom}}" title="{{$value->nom}}">
    </div>
    <div class="tech-sousmenu">
      {{$value->nom}}
    </div>
    @endforeach
  </div>
@endsection
