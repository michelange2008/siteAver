@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'admin' => $admin,
  'listeBlasons' => $listeBlasons,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'campagne' => $campagne,
])

@section('content')
@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()
<!-- {{ link_to_route('troupeau.analyses', "Analyses", [$troupeau->id]) }} -->
<br />
<div class="container d-flex flex-row justify-content-between">
  @foreach($listeCards as $card)
    <div class="card" style="width: 20%">
      <img class="card-img-top" src="{{URL::asset('medias')}}/icones/{{$card->icone()}}" alt="{{$card->icone()}}"/>
      <div class="card-body card-cadre">
        <h5 class="card-title">{{ucfirst($card->titre())}}</h5>
        <p class = "card-text">
          {{$card->texte  ()}}
        </p>
        {{ link_to_route($card->bouton()->route(), ucfirst($card->bouton()->texte()), [$troupeau->id], ['class' => $card->bouton()->couleur().' btn'])}}
        <!-- <a href="{{route($card->bouton()->route(), [$troupeau->id])}}" class="btn {{$card->bouton()->couleur()}} ">{{$card->bouton()->texte()}}</a> -->
      </div>

    </div>


  @endforeach()
</div>
@endsection()
