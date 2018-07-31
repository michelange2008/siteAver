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

<br />
<div class="container d-flex flex-row justify-content-between">
  @foreach($listeCards as $card)
    <div class="card" style="width: 20%">
      <img class="card-img-top" src="{{URL::asset('medias')}}/icones/{{$card->icone()}}" alt="{{$card->icone()}}"/>
      <div class="card-body card-cadre d-flex flex-column justify-content-between">
        <h5 class="card-title">{{ucfirst($card->titre())}}</h5>
        <p class = "card-text">
          {{$card->texte()}}
        </p>
        <p class="card-text italique">
          <?php
            if(in_array(mb_substr($card->titre(), 0, 1), ["a", "e", "i", "o", "u", "y"])){
              echo "Nombre d'".$card->titre()." : ".$card->option();
            }else{
              echo "Nombre de ".$card->titre()." : ".$card->option();
            }
          ?>
        </p>
        @if($card->option() == 0)
          <div class = 'btn btnsecondary'> </div>
        @else()
          {{ link_to_route($card->bouton()->route(), ucfirst($card->bouton()->texte()), [$troupeau->id], ['class' => $card->bouton()->couleur().' btn'])}}
        @endif()
      </div>

    </div>


  @endforeach()
</div>
@endsection()
