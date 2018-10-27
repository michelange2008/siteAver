@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{URL::previous()}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1>Bilans sanitaires annuels</h1>
</div>
<br />
<div class="container-fluid d-flex flex-row justify-content-around">
    @foreach($bsas as $bsa)
    <div class="card">
      <img class="card-img-top" src="{{URL::asset('medias')}}/icones/bsa.svg"/>
        <div class="card-body bg-light">
            <div class="card-title">
              <?php $date = Carbon\Carbon::createFromFormat('Y-m-d', $bsa->date_bsa) ?>
                <h1>{{$date->year}}<span class="plus-petit"> ({{$date->formatLocalized('%d %b')}})</span></h1>
                @if(count($bsa->pss) > 0)
                  <h5>Protocoles de soins</h5>
                @endif()
            </div>
            @foreach($bsa->pss as $ps)
            <div class="bordure">
                <div class="card-text d-flex justify-content-between align-items-end">
                  <img src="{{URL::asset(config('icones_ps.path'))."/".$ps->icone}}" style="height : 50px"/>
                  <h6>{{$ps->nom}}</h6>
                  <a href="{{route('ps.afficheUnEleveur', [$troupeau->user->id, $bsa->id, $ps->id])}}">
                    <div class="pdf_download"></div>
                  </a>
                </div>
                </div>
            @endforeach()
        </div>
    </div>
    @endforeach()
</div>
@endsection()
