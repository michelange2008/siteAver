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
      <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
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
            <?php
            if($troupeau->bsas->count() >0) {
              $bsa = $troupeau->bsas->sortByDesc('date_bsa')->first();
              $bsa_id = $bsa->id;
              $date = new DateTime($bsa->date_bsa);
             ?>
             <div id = "dateetps_{{$troupeau->id}}" class="bsa-date">
              {{ Form::date('date_bsa', $date, ['class' => 'input_date']) }}
            </div>
            <div class="icone-ps">
              <a id = "ouvreps_{{$troupeau->id}}" class = "lien-bsa" bsa = "{{$bsa_id}}" href="{{route('bsa.ps', [$troupeau->id, $bsa_id])}}">
                <img id = "icone_{{$troupeau->id}}" src="{{URL::asset(config('icones.path'))}}/ps_carre.svg" alt="ps" title="Ajouter un protocole de soin" />
              </a>
            </div>
            <?php } else {
              $date = null;
              $bsa_id = "zz";
             ?>
             <div id = "dateetps_{{$troupeau->id}}" class="bsa-date">
              {{ Form::date('date_bsa', $date, ['class' => 'input_date']) }}
            </div>

            <div class="icone-ps">
              <a id = "ouvreps_{{$troupeau->id}}" class = "lien-bsa lien-inactif" bsa = "{{$bsa_id}}" href="{{route('bsa.ps', [$troupeau->id, $bsa_id])}}">
                <img id = "icone_{{$troupeau->id}}" src="{{URL::asset(config('icones.path'))}}/ps_carre_sans_bsa.svg" alt="ps" title="Il n'y a pas de protocole de soin sans bilan sanitaire" />
              </a>
            </div>
            <?php } ?>
      </div>
      <div class="vso">
        <div class="vso-nom">
          VSO
        </div>
        <div  id="vso_{{$troupeau->id}}" class="vso-date">
          <?php if($troupeau->vsoafaire->count() > 0 && $troupeau->vsoafaire->sortByDesc('annee')->first()->annee == $annee->year){?>
            {!! Form::date('date_vso','', ['class' => 'input_date']) !!}
          <?php }else{ ?>
            -
          <?php } ?>
        </div>
        <div class="icone-remarque">
          <a id = "rem_{{$troupeau->id}}" class="lien-bsa">
            <img src="{{URL::asset(config('icones.path'))}}/remarques.svg" alt="remarque" title="Ajouter un commentaire" />
          </a>
        </div>
      </div>
    </li>

      @endforeach()
  {{Form::close()}}
</ul>

@endsection()
