@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')

<div class="container-fluid bg-success d-flex flex-row sous-ruban justify-content-between">
    <h1>Analyses</h1>
</div>
<div class="container-fluid">
  <div class="d-flex justify-content-end">
    <a href="{{Route('admin.analyses.majAnalyses')}}" class="btn btn-gold">Mise à jour de la base de donnée</a>
  </div>

  <div>
    <table id="listeAnalyses" class="table table-striped table-hover tablesorter">
      <thead class="bg-success">
        <tr>
          <th>Nom de l'éleveur</th>
          <th class="text-center">Date</th>
          <th class="text-center">Type d'analyse</th>
          <th class="text-center">n° d'analyse</th>
          <th class="text-center">Fichier</th>
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
          <td class="text-center">{{$analyse->type_analyse}}</td>
          <td class="text-center">{{$analyse->id_analyse}}</td>
          <td class="text-center">
            <a href="{{URL::asset('pdf/analyses').'/'.$analyse->lien}}">fichier</a>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table>
  </div>

</div>

@endsection()
