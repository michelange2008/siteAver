@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{URL::previous()}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1>Analyses</h1>
</div>
<br />
<div class="container-fluid d-flex flex-row justify-content-between">

  @foreach($listeAnalyses as $analyse)
    <div class="card" style="width : 15rem">
      <img class="card-img-top" src="{{URL::asset('medias')}}/icones/analyses/{{$analyse->codeanalyse->icone}}"/>
      <div class="card-body d-flex flex-column justify-content-between">
        <h5 class = "card-title">{{ucfirst($analyse->codeanalyse->intitule)}}</h5>
        <p class = "card-text">
          @if($analyse->date_analyse->year == 0)
            -
          @else()
            {{$analyse->date_analyse->toDateString()}}
          @endif()
        </p>
        <p class="car-text">
          {{$analyse->id_analyse}}
        </p>
        @if($analyse->important)
          <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}" class = "btn btn-danger">Voir l'analyse</a>
        @else()
          <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}" class = "btn btn-success">Voir l'analyse</a>
        @endif()
      </div>
    </div>
  @endforeach()

</div>
@endsection()
