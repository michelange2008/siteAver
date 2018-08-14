@extends('layouts.app')

@section('content')
<div class="container-fluid bg-success">
  <h1 class="text-light titre-non-coupe">Protocoles de soins ({{$troupeau->user->name}} {{$bsa->id}})</h1>
</div>
{{Form::open(['route' => 'bsa.saisie', "method" => "GET"])}}
      <table class="table table-stripped table-hover">
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
                      {{Form::checkbox('ps_donne', 'checked' , 'checked')}} <!-- Si oui on renvoie la case cochée -->
                    </td>
                    <td>
                      {!! Form::date('date-ps', $ps->bsas->sortByDesc('date_bsa')->first()->date_bsa) !!} <!-- avec la date du bsa correspondant -->
                    </td>
                  @endif()
                @endforeach()
              @endif()
              @if(!$trouve)<!-- si non on affiche une case vide -->
                    <td>
                      {{Form::checkbox('ps_donne')}}
                    </td>
                    <td>
                      <span id = "date_ps" class="non_affiche">{{Carbon\Carbon::now()->format('Y/m/j')}}</span>
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
