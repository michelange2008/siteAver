@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')
@push('css')
      <link href="{{ asset('css/analyses.css') }}" rel="stylesheet">
@endpush()

@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{URL::previous()}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
    </a>
    <h1>Analyses</h1>
</div>

<div class="container-fluid d-flex analyses">

  @foreach($listeAnalyses as $analyse)
    <div class="card card-analyses" >
      <img class="card-img-top card-img-analyses" src="{{URL::asset(config('icones.path'))}}/analyses/{{$analyse->codeanalyse->icone}}"/>
      <div class="card-body card-body-analyses d-flex">
        <h5 class = "card-title">{{ucfirst($analyse->codeanalyse->intitule)}}</h5>
        <p class = "card-text">
          @if($analyse->date_analyse->year == 0)
            -
          @else()
            {{$analyse->date_analyse->toDateString()}}
          @endif()
        </p>
        <p class="car-text smartphone-no">
          {{$analyse->id_analyse}}
        </p>
        @if($analyse->important)
          <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}" class = "btn btn-danger btn-analyses">Voir<span class="smartphone-no"> l'analyse</span></a>
        @else()
          <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}" class = "btn btn-success btn-analyses">Voir<span class="smartphone-no"> l'analyse</span></a>
        @endif()
      </div>
    </div>
  @endforeach()

</div>
@endsection()
