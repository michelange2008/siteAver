@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<br>
<div class="container">
  @if(isset($titre)) <h4>{{$titre}}</h4>@endif
  @if($titre != 'Admin')
  <nav class="nav navbar">
    <nav class="nav-item">{!! link_to_route('user.create', 'Créer un nouvel éleveur','' ,['class' => 'btn btn-sm btn-secondary text-white']) !!}</nav>
    <nav class="nav-item">{!! link_to_route('majNbTroupeau', 'MàJ nombre de troupeaux', '',['class' => 'btn btn-sm btn-warning text-white']) !!}</nav>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher un éleveur" aria-label="Search">
      <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </nav>
  @endif()
  <table id="listeEleveurs" class="table table-hover table-sm tablesorter">
    <thead>
      <tr class="bg-success">
          <th scope="col"> <i class="fa fa-sort" ></i> Nom</th>
        <th scope="col"> <i class="fa fa-sort" ></i> Email</th>
        <th scope="col"> <i class="fa fa-sort" ></i> @if($titre == 'Admin') CRO @else() EDE @endif()</th>
        @if($titre != 'Admin')
        <th scope="col" class="text-left"> <i class="fa fa-sort" ></i> Troupeaux</th>
        @endif()
        <th scope="col" class="text-center"> <i class="fa fa-sort" ></i> Type d'activité</th>
        <th scope="col" class="text-center"> <i class="fa fa-sort" ></i> V.S.</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($troupeaux as $troupeau)
      <tr id="{{ $troupeau->user->id }}" class="ligne_eleveur">
          <th id="{{ $troupeau->id }}" scope="row" class="align-middle nom_eleveur">{{ $troupeau->user->name }}</th>
        <td class="{{ $troupeau->id }} align-middle">
            @if(substr($troupeau->user->email, -2) != "af") 
               {{ $troupeau->user->email }}
            @else -
            @endif
        </td>
        <td id="{{ $troupeau->id}}" class="{{ $troupeau->id }} align-middle">{{ ($troupeau->user->ede == 0)? '-' : $troupeau->user->ede }}</td>
        @if($titre != 'Admin')
        <td class="align-middle text-left {{ $troupeau->especes->abbreviation }}">{{ $troupeau->especes->nom }}</td>
        @endif()
        <td class="align-middle text-center" >{{ $troupeau->user->activite->nom }}</td>
        <td class="align-middle text-center" >
            @if($troupeau->user->vetsan === null)
                <button class="btn btn-sm btn-outline-danger">à def.</button></td>
            @elseif($troupeau->user->vetsan)
                <button class="btn btn-sm btn-outline-success"> oui </button></td>
            @else
                <button class="btn btn-sm btn-outline-grey"> non </button></td>
            @endif
        <td>{!! link_to_route('troupeau.show', 'Afficher', [$troupeau->id], ['class' => 'btn btn-outline-success btn-sm']) !!}</td>
          {!! Form::close() !!}
      </tr>
      @endforeach
      <tbody>
    </table>
  </div>
@endsection
