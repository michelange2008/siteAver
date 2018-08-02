@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="container-fluid bg-success espace-lg espace-bas">
  <h4 class="text-light">Protocoles de soins</h4>
</div>
<br />
<div class="containe-fluid">
  <table id="listePs" class="table table-hover table-stripped datasorter">
    <thead>
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
    @foreach($listePs as $ps)
    <tr>
      <td>
        {{$ps->nom}}
      </td>
    </tr>
    @endforeach()
    <tbody>


    </tbody>

  </table>
</div>
@endsection()
