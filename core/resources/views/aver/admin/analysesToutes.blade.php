@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@section('content')

<div class="container-fluid bg-success d-flex flex-row sous-ruban justify-content-between align-middle">
    <h1>Analyses</h1>
</div>

  {!! Form::open(['route' => 'admin.analyses.changeImportant', 'id' => 'changeImportant']) !!}
  <div class="d-flex justify-content-end">
    <a href="{{Route('admin.analyses.majAnalyses')}}" class="btn btn-gold">Mise à jour de la base de donnée</a>
  </div>

  <div>
    <table id="listeAnalyses" class="table table-striped table-hover tablesorter">
      <thead class="bg-success">
        <tr>
          <th>Eleveur</th>
          <th class="text-center">Date</th>
          <th class="text-center">Analyse</th>
          <th class="text-center">Important</th>
          <th class="text-center">n°</th>
          <th class="text-center">Fichier</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listeAnalyses as $analyse)

        <tr>
          <td class="lien">
            {!! link_to_route('troupeau.accueil',
              $analyse->user->name, [$analyse->user->troupeau->first()->id],
              [
                'class' => $analyse->user->activite->abbreviation,
                'title' => "afficher la situation de ".$analyse->user->name
                ]) !!}
          </td>
          <td class="text-center">
            @if($analyse->date_analyse->year == 0)
              -
            @else()
              {{$analyse->date_analyse->toDateString()}}
            @endif()
          </td>
          <td class="text-center">{{$analyse->codeanalyse->intitule}}</td>
          <td class="text-center">
            @if($analyse->important)
            <div class="ailleurs">
              <input type="checkbox" checked = "checked" name = "cb_{{$analyse->id}}" id = "cb_{{$analyse->id}}"/>
            </div>
            <div  id = "sb_{{$analyse->id}}" class = "bouton petite_icone important curseur" ></div>
            @else()
            <div  class = "ailleurs">
              <input type="checkbox" name = "cb_{{$analyse->id}}" id = "cb_{{$analyse->id}}"/>
            </div>
            <div  id = "sb_{{$analyse->id}}" class = "bouton petite_icone pasImportant curseur" ></div>
            @endif()
          </td>
          <td class="text-center">{{$analyse->id_analyse}}</td>
          <td class="text-center">
            <a href="{{URL::asset(config('fichiers.analyses'))."/".$analyse->lien}}">
              <div class="pdf_download lien-icone-centre">
                <img src="{{URL::asset(config('fichiers.icones'))}}/PDF_download.svg" alt="">
              </div></a>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table>
  </div>

@endsection()
