@extends('layouts.app')

@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('home')}}" title="revenir à l'accueil">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1 class="text-light">Bilans sanitaires annuels</h1>
</div>
<br />
<div class="container-fluid">
  {{ Form::open(['route' => 'bsa.store'])}}
  <table id="listeEleveurs" class="table table-stripped table-hover">
    <thead>
      <tr>
        <td>Eleveur</td>
        <td>Troupeau</td>
        <td class="text-center">BSA</td>
        <td class="text-center">PS</td>
        <td class="text-center"></td>
        <td class="text-center">VS0</td>
      </tr>
    </thead>
    <tbody>
      @foreach($troupeaux as $troupeau)
          <tr>
            <td>{{$troupeau->user->name}}</td>
            <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
            <td id="{{$troupeau->id}}" class="text-center bsa-date">

              <?php
                if($troupeau->bsas->count() >0) {
                  $bsa = $troupeau->bsas->sortByDesc('date_bsa')->first();
                  $date = new DateTime($bsa->date_bsa);
                } else {
                  $date = null;
                } ?>

                {{ Form::date('date_bsa', $date) }}
            </td>
            <td>
              <a id = "ouvreps_{{$troupeau->id}}" bsa = "{{$bsa->id}}" href="{{route('bsa.ps', [$troupeau->id, $bsa->id])}}">
                <img class="moyenne-icone" src="{{URL::asset('medias')}}/icones/ps_carre.svg" alt="ps" title="Ajouter un protocole de soin" />
              </a>
            </td>
            <td class="text-center">
                <img id = "rem_{{$troupeau->id}}" class="curseur moyenne-icone" data-toggle = "modal" data-target = "#remarque"
                  src="{{URL::asset('medias')}}/icones/remarques.svg" alt="remarque" title="Ajouter un commentaire" />
            </td>
            <td class="text-center">
              <?php if($troupeau->anneevso->count() > 0 && $troupeau->anneevso->sortByDesc('debut')->first()->campagne == $campagne){?>
                {!! Form::date('date_vso') !!}
              <?php }else{ ?>
                -
              <?php } ?>
            </td>
          </tr>
      @endforeach()
    </tbody>
  </table>
  {{Form::close()}}
</div>

@endsection()
