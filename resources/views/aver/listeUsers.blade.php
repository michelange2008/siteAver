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
  <table class="table table-hover table-sm">
    <thead>
      <tr class="bg-success">
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">@if($titre == 'Admin') CRO @else() EDE @endif()</th>
        @if($titre != 'Admin')
        <th scope="col">Troupeaux</th>
        @endif()
        <th scope="col" class="text-center">Type d'activité</th>
        <th scope="col" class="text-center">V.S.</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr id="{{ $user->id }}" class="ligne_eleveur">
        <th scope="row" class="align-middle">{{ $user->name }}</th>
        <td class="align-middle">{{ $user->email }}</td>
        <td class="align-middle">{{ ($user->ede == 0)? '-' : $user->ede }}</td>
        @if($titre != 'Admin')
        <td class="align-middle text-center">{{ $user->nb_tp }}</td>
        @endif()
        <td class="align-middle text-center" >{{ $user->activite->nom }}</td>
        <td class="align-middle text-center" >
            @if($user->vetsan === null)
                <button class="btn btn-sm btn-outline-danger">à def.</button></td>
            @elseif($user->vetsan)
                <button class="btn btn-sm btn-outline-success"> oui </button></td>
            @else
                <button class="btn btn-sm btn-outline-grey"> non </button></td>
            @endif
        <td>{!! link_to_route('user.show', 'Afficher', [$user->id], ['class' => 'btn btn-outline-success btn-sm']) !!}</td>
          {!! Form::close() !!}
      </tr>
      @endforeach
      <tbody>
    </table>
  </div>
@endsection
