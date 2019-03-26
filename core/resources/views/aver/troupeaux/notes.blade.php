@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@section('content')
  <div class="container-fluid bg-success d-flex flex-row sous-ruban">
      <span class="troupeau_id" id="{{$troupeau->id}}" ></span>
      <a href="{{URL::previous()}}" title="revenir à la liste des éleveurs">
        <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
      </a>
      <h1>Notes ({{$troupeau->user->name}})</h1>
  </div>
  <br />
  <table id="notes" class="table table-striped table-hover">
    <thead class="table-dark">
      <th>Date</th>
      <th>Note</th>
      <th>Mod.</th>
      <th>Suppr.</th>
    </thead>
      <div class="ajouter_note
      @if ($notes->count() > 0)
        invisible
      @endif
      ">
        <h4>Pour ajouter une note</h4><h4>cliquer sur le + en bas de l'écran</h4>
      </div>
    @foreach($notes as $note)
    <tr id="ligne_{{$note->id}}">
      <td>{{$note->updated_at->formatLocalized('%d %b %Y')}}</td>
      <td>{{$note->texte}}</td>
      <td><img id="modifie_{{$note->id}}" class="pdf_ps curseur modifie" src="{{URL::asset(config('fichiers.icones'))}}/modifie.svg" alt="Modifier"></td>
      <td><img id="supprime_{{$note->id}}" class="pdf_ps curseur supprime" src="{{URL::asset(config('fichiers.icones'))}}/moins.svg" alt="SUpprimer"></td>
    </tr>
    @endforeach
  </table>
  <div class="float ajoute"></div>
@endsection
