@extends('layouts.app')

@section('content')
  <!-- Page d'affichage des protocoles de soin pour un éleveur -->
<div class="container-fluid bg-success d-flex flex-row ">
  <a href="{{route('troupeau.bsa', [$troupeau->user->id, $troupeau->id])}}">
    <img style="height:50px" src="{{URL::asset(config('fichiers.icones'))}}/bsa_trans.svg" alt="Vers les bsa" title="vers les bsa de cet éleveur">
  </a>
  <h1 class="text-light titre-non-coupe">Protocoles de soins ({{$troupeau->user->name}})</h1>
</div>
@if (Session::has('message'))
  <div class="container-fluid bg-success">
    <h2 class="text-light">{{Session::get('message')}}</h2>
  </div>
@endif

{{Form::open(['route' => 'bsa.saisie', "method" => "GET"])}}
      <input type = 'hidden' name = "{{$troupeau->id}}" id = 'troupeau_id' />
      <table class="table table-striped table-hover">
      @foreach($pss as $ps)
      <?php $trouve = false ?>
        @foreach($ps->especes as $espece)
          @if($espece->id === $troupeau->especes->id) <!-- On n'affiche que les ps correspondant à l'espèce du troupeau -->
          <tr>
            <td>{{$ps->nom}}</td>
              @if($ps->bsas->count() > 0) <!-- On regarde s'il y a des bsa correspondant à ce ps -->
                @foreach($ps->bsas as $bsa) <!-- Si oui on passe en revue ces bsa -->
                  @if($bsa->troupeau_id === $troupeau->id) <!-- Et on vérifie s'ils correspondent à ce troupeau -->
                    <?php $trouve = true ?>
                    <td>
                      <img src="{{URL::asset(config('fichiers.icones'))}}/moins.svg" etat="present"
                        id = "cb_{{$ps->id}}" class = "cb pdf_ps curseur" bsa= "{{$bsa->id}}"
                        ps = "{{$ps->id}}" alt="delete" title= "supprimer ce protocole de soin"> <!-- Si oui on renvoie la case cochée -->
                    </td>
                    <td id="ps_date_bsa_{{$ps->id}}" class="ps_date_bsa"><p>{{ \Carbon\Carbon::parse($bsa->date_bsa)->formatLocalized('%d %B %Y')}}</p></td>
                    <td>
                      <a id="envoi_ps_{{$ps->id}}" href="{{route('envoiPs',['troupeau_id'=>$troupeau->id, "bsa" => $bsa_encours->id, "ps" => $ps->id])}}">
                        <img class="pdf_ps" src="{{URL::asset(config('icones.path'))}}/PDF_send.svg" alt="">
                      </a>
                    </td>

                  @endif()
                @endforeach()
              @endif()
              @if(!$trouve)<!-- si non on affiche une case vide -->
                    <td>
                      <img src="{{URL::asset(config('fichiers.icones'))}}/plus.svg" etat = "absent"
                              id = "cb_{{$ps->id}}" class = "cb pdf_ps" ps = "{{$ps->id}}" bsa = "{{$bsa_encours->id}}"
                              alt="ajouter" title = "ajouter un protocole de soin">
                    </td>
                    <td id="ps_date_bsa_{{$ps->id}}" class="ps_date_bsa"></td>
                    <td>
                      <a id="envoi_ps_{{$ps->id}}" class="invisible" href="{{route('envoiPs',['troupeau_id'=>$troupeau->id, "bsa" => $bsa_encours->id, "ps" => $ps->id])}}" value = "">
                        <img class="pdf_ps" src="{{URL::asset(config('icones.path'))}}/PDF_send.svg" alt="">
                      </a>
                    </td>
              @endif()
            </tr>
            @endif()
        @endforeach()
      @endforeach()
    </table>
    <div class="container">
      {{Form::submit('fermer', ['class' => 'btn btn-success'])}}
    </div>
  </br>

{{Form::close()}}

@endsection()
