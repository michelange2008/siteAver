@extends('layouts.app')

@section('content')
  <!-- Page d'affichage des protocoles de soin pour un éleveur -->
<div class="container-fluid bg-success">
  <h1 class="text-light titre-non-coupe">Protocoles de soins ({{$troupeau->user->name}})</h1>
</div>
{{Form::open(['route' => 'bsa.saisie', "method" => "GET"])}}
      <input type = 'hidden' name = "{{$troupeau->id}}" id = 'troupeau_id' />
      <input type = 'hidden' name = "{{$bsa->id}}" id = 'bsa_id' />
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
                      <input type="checkbox" id = "cb_{{$ps->id}}" class = "cb" name = "{{$ps->id}}" checked = "checked" /> <!-- Si oui on renvoie la case cochée -->
                    </td>
                    <td>
                      <input type="date" id = "{{$ps->id}}" class="date_ps"  value = "{{ $ps->bsas->sortByDesc('date_bsa')->first()->date_bsa }}"/>
                        <!-- avec la date du bsa correspondant -->
                    </td>
                    <td>
                      <a href="{{route('ps.afficheUnEleveur',[$troupeau->user->id, $bsa->id, $ps->id])}}">
                        <img class="pdf_ps" src="{{URL::asset(config('icones.path'))}}/PDF_download.svg" alt="">
                      </a>
                    </td>
                  @endif()
                @endforeach()
              @endif()
              @if(!$trouve)<!-- si non on affiche une case vide -->
                    <td>
                      <input type="checkbox" id = "cb_{{$ps->id}}" class = "cb" name = "{{$ps->id}}" />
                    </td>
                    <td>
                      <input type="date" id = "{{$ps->id}}" class="date_ps invisible" />
                    </td>
                    <td>
                      <img class="pdf_ps pdf_ps_gris" src="{{URL::asset(config('icones.path'))}}/PDF_download.svg" alt="">
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
