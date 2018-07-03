@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<div class="container">
  @if($nbUsersAjoutes > 0)
    <h4 class="alert alert-success">J'ai ajouté {{ $nbUsersAjoutes }} éleveurs dans la base de donnée</h4>
  @else
    <h4 class="alert alert-success">Il n'y a aucun éleveur à ajouter dans la base de donnée</h4>
  @endif
</div>
<div class="container">
  <h4 class="alert alert-warning">Ces éleveurs ont été supprimés de la base de données FEVEC: faut-il les supprimer ?</h4>

    <table class="table table-hover">
      @foreach($liste as $suppr)
      <tr>
        <td class="align-middle">{{ $suppr->name }}</td>
        <td>{{ link_to_route('user.supprimerEleveur', 'Supprimer', [$suppr->id], ['class' => 'btn btn-sm btn-danger']) }}
        <td>{{ link_to_route('fevec.index', 'Conserver', '', ['class' => 'btn btn-sm btn-success']) }}
      </tr>
      @endforeach
        <tr class="table-dark">
          <td class="align-middle"><strong>Liste entière</strong></td>
          <td>{{ link_to_route('user.toutSupprimer', 'Tout supprimer', $listeId, ['class' => 'btn btn-sm btn-danger']) }}
          <td>{{ link_to_route('fevec.index', 'Tout conserver', '', ['class' => 'btn btn-sm btn-success']) }}
        </tr>
    </table>

@endsection
