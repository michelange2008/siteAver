@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
<div class="container">
  @if($nbUsersAjoutes > 0)
    <h4 class="alert alert-success">J'ai ajouté {{ $nbUsersAjoutes }} éleveurs dans la base de donnée</h4>
  @else
    <h4 class="alert alert-success">Il n'y a aucun éleveur à ajouter dans la base de donnée</h4>
  @endif
</div>
<div class="container">
  <h4 class="alert alert-warning">Aucun éleveur n'a été supprimé de la base de données FEVEC</h4>
@endsection
