@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')

<div class="container-fluid bg-success d-flex flex-row sous-ruban">


    <h1>Analyses</h1>
</div>
<div class="container-fluid">
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
          <td>{{$analyse->nom_eleveur()}}</td>
          <td class="text-center">
            @if($analyse->date()->year == 0)
              -
            @else()
              {{$analyse->date()}}
            @endif()
          </td>
          <td class="text-center">{{$analyse->type_analyse()}}</td>
          <td class="text-center">{{$analyse->id_analyse()}}</td>
          <td class="text-center">
            <a href="{{URL::asset('pdf/analyses').'/'.$analyse->link()}}">fichier</a>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table>
  </div>

</div>

@endsection()
