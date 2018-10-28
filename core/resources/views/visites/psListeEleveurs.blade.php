@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('ps.index')}}" title="revenir à la liste des protocoles de soin">
      <img class="image-h" src="{{URL::asset(config('icones.path'))}}/retour.svg" alt="retour" />
    </a>
    <h1>{{$ps->nom}}</h1>
</div>
<br />
<div class="container-fluid d-flex flex-row justify-content-around">
  <div>
    <img src="{{URL::asset(config('icones_ps.path'))."/".$ps->icone}}" />
  </div>
<table class="table table-stripped table-hover datasorter">
  <thead>
    <tr>
      <th>
        Nom de l'éleveur
      </th>
      <th>
        Troupeau
      </th>
      <th>
        Date du bilan
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach($ps->bsas as $bsa)
    <tr>
      <td>
        {{$bsa->troupeau->user->name}}
      </td>
      <td>
        {{$bsa->troupeau->especes->nom}}
      </td>
      <td>
        <?php $date = new DateTime($bsa->date_bsa) ?>
        <span class="gras">{{$date->format('Y')}}</span> ( {{$date->format('j M ')}} )
      </td>
    </tr>
    @endforeach()

  </tbody>
</table>
</div>

@endsection()
