@extends('layouts.app')

@push('css')
  <link href="{{ asset('css/bsaSaisie.css') }}" rel="stylesheet">
@endpush

@push('js')
  <script src="{{ asset('js/saisieBsaPs.js')}}"></script>
@endpush()

@section('content')



<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('home')}}" title="revenir à l'accueil">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1 class="text-light titre-non-coupe">Bilans sanitaires annuels</h1>
</div>

{{ Form::open(['route' => 'bsa.store'])}}
<ul class = "enveloppe">
    @foreach($troupeaux as $troupeau)
    <li class="ligne">
      <div class="troupeau-infos">
        <div class="name-espece">
          <div class="user-name">
            <h4>{{$troupeau->user->name}}</h4>
          </div>
          <div class="troupeau-espece {{$troupeau->especes->abbreviation}}">
            <h6>{{$troupeau->especes->nom}}</h6>
          </div>
        </div>
        <div class="ede">
          {{$troupeau->user->ede}}
        </div>
      </div>
      <div class="bsa">
          <div class="bsa-nom">
            BSA
          </div>
          <div id="{{$troupeau->id}}" class="bsa-date">
            <?php
            if($troupeau->bsas->count() >0) {
              $bsa = $troupeau->bsas->sortByDesc('date_bsa')->first();
              $date = new DateTime($bsa->date_bsa);
            } else {
              $date = null;
            } ?>
            {{ Form::date('date_bsa', $date, ['class' => 'input_date']) }}
          </div>
          <div class="icone-ps">
            <a id = "ouvreps_{{$troupeau->id}}" class = "lien-bsa" bsa = "{{$bsa->id}}" href="{{route('bsa.ps', [$troupeau->id, $bsa->id])}}">
              <img src="{{URL::asset('medias')}}/icones/ps_carre.svg" alt="ps" title="Ajouter un protocole de soin" />
            </a>
          </div>
      </div>
      <div class="vso">
        <div class="vso-nom">
          VSO
        </div>
        <div  id="vso_{{$troupeau->id}}" class="vso-date">
          <?php if($troupeau->anneevso->count() > 0 && $troupeau->anneevso->sortByDesc('debut')->first()->campagne == $campagne){?>
            {!! Form::date('date_vso','', ['class' => 'input_date']) !!}
          <?php }else{ ?>
            -
          <?php } ?>
        </div>
        <div class="icone-remarque">
          <a id = "rem_{{$troupeau->id}}" class="lien-bsa">
            <img src="{{URL::asset('medias')}}/icones/remarques.svg" alt="remarque" title="Ajouter un commentaire" />
          </a>
        </div>
      </div>
    </li>

      @endforeach()
  {{Form::close()}}
</ul>

@endsection()
