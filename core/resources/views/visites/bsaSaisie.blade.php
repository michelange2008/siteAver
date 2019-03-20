@extends('layouts.app')

@push('css')
  <link href="{{ asset('css/bsaSaisie.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('home')}}" title="revenir à l'accueil">
      <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
    </a>
    <h1 class="text-light titre-non-coupe">Bilans sanitaires annuels</h1>
</div>
<input id="chercher" class="form-control mr-sm-2" type="text" name="search" placeholder="chercher" value="">

{{ Form::open(['route' => 'bsa.store'])}}
<ul class = "enveloppe">
    @foreach($troupeaux as $troupeau)
    <li class="ligne" id="{{$troupeau->user->name}}">
      <div class="troupeau-infos">
        <div class="name-espece">
          <div class="user-name">
            <a href="{{route('troupeau.bsa', [$troupeau->user->id, $troupeau->id])}}" class="text-dark" title="Voir les détails de cet éleveur">
              <h4>{{$troupeau->user->name}}</h4>
            </a>
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
             <div id = "dateetps_{{$troupeau->id}}" class="bsa-date">
              {{ Form::date('date_bsa', "", ['class' => 'input_date']) }}
            </div>
            <div id="bsaok_{{$troupeau->id}}" class="bsaok">
              <img src="{{URL::asset(config('fichiers.icones'))}}/ok.svg" alt="enregistrer" class="pdf_ps curseur">
            </div>
            <div class="icone-ps">
                <img id = "icone_{{$troupeau->id}}" class="icone_ps"
                          troupeau = "{{$troupeau->id}}" bsa="" href="{{route('bsa.ps', [$troupeau->id, '0'])}}"
                          src="{{URL::asset(config('icones.path'))}}/ps_carre_sans_bsa.svg"
                          alt="ps" title="Ajouter un protocole de soin" />
              <!-- </a> -->
            </div>
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
        <div id="vsook_{{$troupeau->id}}" class="vsook">
          <?php if($troupeau->vsoafaire->count() > 0 && $troupeau->vsoafaire->sortByDesc('annee')->first()->annee == $annee->year){?>
            <img src="{{URL::asset(config('fichiers.icones'))}}/ok.svg" alt="enregistrer" class="pdf_ps curseur">
          <?php }else{ ?>
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
