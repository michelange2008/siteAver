{{-- < vue issue de Aver\Fichiers\Bsa\BsaController@index--}}
@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@section('content')
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('troupeau.accueil', ['troupeau_id' => $troupeau->id])}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
    </a>
    <h1>Bilans sanitaires annuels ({{$troupeau->user->name}})</h1>
</div>
<br />
<div class="analyse-bsps">
    @foreach($bsas as $bsa)
      <div id="carte_{{$bsa->id}}" class="carte">
        <div class="carte-titre">
          <div class="carte-titre-icone">
            <a href="{{route('bsa.saisie')}}">
              <img src="{{URL::asset(config('icones.path'))}}/visites/bsa_carre.svg"/>
            </a>
          </div>
          <div class="carte-titre-texte">
            <?php $date = Carbon\Carbon::createFromFormat('Y-m-d', $bsa->date_bsa) ?>
            <h5>{{$date->year}} ({{$date->formatLocalized('%d %B')}})</h5>
          </div>
          <div class="carte-titre-icone">
            <img id="deleteBsa_{{$bsa->id}}" src="{{URL::asset(config("fichiers.icones"))}}/delete.svg" alt="delete" class="delete_bsa pdf_ps curseur">
          </div>
        </div>
        <div class="carte-main">
          @if(count($bsa->pss) > 0)
            <div class="d-flex flex-row align-items-baseline">
              <h5>Protocoles de soins </h5>
              <a class="text-dark" href="{{route('bsa.ps', [$troupeau->id, $bsa->id])}}">
                <img class="curseur" src="{{URL::asset(config('fichiers.icones'))}}/lien.svg" style="height: 15px" alt="lien" title="cliquer pour afficher la saisie des protocoles de soin">
              </a>
            </div>
            @foreach($bsa->pss as $ps)
                <div class="carte-main-ps">
                  <img src="{{URL::asset(config('fichiers.ps')).'/'.$ps->icone}}" style="height : 50px"/>
                  <h6>{{$ps->nom}}</h6>
                  <a href="{{route('ps.afficheUnEleveur', [$troupeau->user->id, $bsa->id, $ps->id])}}">
                    <div class="pdf_download">
                      <img src="{{URL::asset(config('fichiers.icones'))}}/PDF_telecharge.svg">
                    </div>
                  </a>
                </div>
            @endforeach()
          @else
            <h5 class="estompe">Pas de protocole de soins enregistré</h5>
            <img class="no-ps" src="{{URL::asset(config('fichiers.icones'))}}/visites/no_ps.svg" alt="no ps">
          @endif()
        </div>
      </div>
    @endforeach()
@endsection()
