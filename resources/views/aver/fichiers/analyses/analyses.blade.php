@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('troupeau.accueil', $troupeau->id)}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1>Analyses</h1>
</div>

<div class="container-fluid">
  <div>
    <table id="listeAnalyses" class="table table-striped table-hover tablesorter">
      <thead>
        <tr>
          <th>Nom de l'éleveur</th>
          <th>Date</th>
          <th>Type d'analyse</th>
          <th>n° d'analyse</th>
          <th>Fichier</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listeAnalyses as $analyse)
        <tr>
          <td>{{$analyse->user->name}}</td>
          <td class="text-center">
            @if($analyse->date_analyse->year == 0)
              -
            @else()
              {{$analyse->date_analyse->toDateString()}}
            @endif()
          </td>
          <td>{{$analyse->type_analyse}}</td>
          <td>{{$analyse->id_analyse}}</td>
          <td>
            <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}">fichier</a>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table
  </div>

</div>
@endsection()
