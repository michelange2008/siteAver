@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="container-fluid bg-success">
  <h4 class="text-light">{{$ps->nom}} <span class="plus-petit">(
    @foreach($ps->especes as $espece)
      {{strToLower($espece->nom)}},
    @endforeach()
    )</span>
  </h4>
</div>

<div class="container">
  @if($psDetail !== null)
  <div>
  {!! $psDetail->titre !!}
  </div>
  <div>
    <h5 class="bg-dark text-light">Diagnostic</h5>
    {!! $psDetail->diagnostic !!}
  </div>
  <div>
    <h5 class="bg-dark text-light">Traitement</h5>
    {!! $psDetail->traitement !!}
  </div>
  <div>
    <h5 class="bg-dark text-light">Prévention</h5>
    {!! $psDetail->prevention !!}
  </div>
  <div>
    <h5 class="bg-dark text-light">Appel</h5>
    {!! $psDetail->appel !!}
  </div>
@endif()
</div>

@endsection()
