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
      <td {{$ps->fichier}}>
        {{$ps->nom}} <span class="plus-petit italique">({{$ps->fichier}})</span>
      </td>
      @foreach($listeEspeces as $espece)
      <td style="text-align : center">
        @if($ps->especes->pluck('id')->contains($espece->id))
          <input type="checkbox" name="{{$ps->id}}_{{$espece->id}}" checked = 'checked' />
        @else()
        <input type="checkbox" name="{{$ps->id}}_{{$espece->id}}" />
        @endif()
      </td>
      @endforeach()
      <td >
         <a href="{{URL::asset('pdf/ps').'/'.$ps->fichier}}" title="ouvrir le fichier">
           <div class="pdf_download" ></div>
         </a>
      </td>
      <td class="essai d-flex justify-content-end">
        <div class = 'delete' name="{{route('ps.destroy', $ps->id)}}"></div>
      </td>
    </tr>
    @endforeach()
    </tbody>
  </table>
  {!! Form::close() !!}
</div>
@endsection()
