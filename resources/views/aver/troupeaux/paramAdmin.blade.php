@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'admin' => $admin,
  'listeBlasons' => $listeBlasons,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'campagne' => $campagne,
])

@section('content')
  {{Form::open(['route' => 'troupeau.paramAdmin.modif'])}}
  {{Form::hidden('id_troupeau', $troupeau->id)}}
  <div class="container-fluid bg-success espace">
    <h4>Modification des paramètres de cet éleveur</h4>
  </div>
  <div class="container-fluid bg-light">
    {{Form::label('vetsan', 'Nous sommes vétérinaires sanitaires: ')}}
    {{Form::checkbox('vetsan', 1 , $troupeau->user->vetsan)}}

    {{Form::label('prophylo', 'Il y a des prophylaxies en '.$campagne.' : ')}}
    {{Form::checkbox('prophylo', 1 , $troupeauCampagne->prophylo())}}

    {{Form::label('vso', 'La VSO est à faire en '.$campagne.' : ')}}
    {{Form::checkbox('vso', 1 , $troupeauCampagne->vso())}}

    {{Form::label('bsaimportant', 'Il faut faire le BSA impérativement: ')}}
    {{Form::checkbox('bsaimportant', 1 , $troupeau->bsaimportant)}}

    {{Form::submit('Enregistrer')}}
    {{Form::reset('Annuler')}}


  </div>

  {{Form::close()}}

@endsection()
