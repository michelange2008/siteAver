@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')
@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()

<div class="container-fluid bg-success espace-lg espace-bas">
  <h4 class="text-light">Protocoles de soins</h4>
</div>
<br />
<div class="container-fluid">
  {{ Form::open(['route' => 'ps.modif'])}}
  <div class="d-flex justify-content-end">
    <a href = "{{route('ps.create')}}" class = "btn , btn-warning">Ajouter un protocole de soin</a>
    <input type="submit" class="btn btn-success" value="mise à jour"/>
  </div>
  <br />
  <table id="listeEleveurs" class="table table-hover table-stripped datasorter">
    <thead class="sticky-top" style="z-index : 100000">
      <tr>
        <th>
          Nom du protocole de soins
        </th>
        @foreach($listeEspeces as $espece)
        <th class="text-center">
          {{$espece->nom}}
        </th>
        @endforeach()
        <th>Voir</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
    @foreach($listePs as $ps)
    <tr>
      <td class="lien">
        <a class = "text-dark" href="{{route('ps.affiche', $ps->id)}}" >
          <img class="moyenne-icone " src ="{{asset(config('fichiers.ps'))."/".$ps->icone}}" />
           {{$ps->nom}} <span class="plus-petit italique">({{$ps->fichier}})</span>
        </a>
      </td>
      @foreach($listeEspeces as $espece)
      <td class="align-middle text-center">
        @if($ps->especes->pluck('id')->contains($espece->id))
          <input type="checkbox" name="{{$ps->id}}_{{$espece->id}}" checked = 'checked' />
        @else()
        <input type="checkbox" name="{{$ps->id}}_{{$espece->id}}" />
        @endif()
      </td>
      @endforeach()
      <td >
         <a class="d-flex justify-content-center align-items-center" href="{{URL::asset(config('fichiers.ps_pdf'))."/".$ps->fichier}}" title="ouvrir le fichier">
           <div class="pdf_download">
             <img src="{{URL::asset(config('fichiers.icones'))}}/PDF_telecharge.svg">
           </div>
         </a>
      </td>
      <td class="essai d-flex justify-content-center">
        <div class = 'curseur delete' name="{{route('ps.destroy', $ps->id)}}">
          <div class="pdf_download">
            <img src="{{URL::asset(config('fichiers.icones'))}}/delete.svg">
          </div>
        </div>
      </td>
    </tr>
    @endforeach()
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection()
