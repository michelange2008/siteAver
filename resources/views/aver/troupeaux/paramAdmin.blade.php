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
  <div class="container form bg-light">
    <div class="form-group">
      <div class="form-check">
        {{Form::checkbox('vetsan', 1 , $troupeau->user->vetsan, ['class' => 'form-check-input'])}}
        {{Form::label('vetsan', 'Nous sommes vétérinaires sanitaires', ['class' => 'form-check-label'])}}
      </div>

      <div class="form-check">
    {{Form::checkbox('prophylo', 1 , $troupeauCampagne->prophylo(), ['class' => 'form-check-input'])}}
    {{Form::label('prophylo', 'Il y a des prophylaxies en '.$campagne, ['class' => 'form-check-label'])}}
      </div>

      <div class="form-check">
    {{Form::checkbox('vso', 1 , $troupeauCampagne->vso(), ['class' => 'form-check-input'])}}
    {{Form::label('vso', 'La VSO est à faire en '.$campagne, ['class' => 'form-check-label'])}}
      </div>

      <div class="form-check">
        {{Form::checkbox('bsaimportant', 1 , $troupeau->bsaimportant, ['class' => 'form-check-input'])}}
        {{Form::label('bsaimportant', 'Il faut faire le BSA impérativement', ['class' => 'form-check-label'])}}
      </div>

      <div class="form-check">
        {{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
        {{Form::reset('Annuler', ['class' => 'btn btn-warning'])}}
      </div>

  </div>

  </div>

  {{Form::close()}}

@endsection()
