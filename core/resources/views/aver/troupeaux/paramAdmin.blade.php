@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'listeSceaux' => $listeSceaux,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'nombreDeTroupeau' => $nombreDeTroupeau,
  'campagne' => $campagne,
])

@section('content')
  {{Form::open(['route' => 'troupeau.paramAdmin.modif'])}}
  {{Form::hidden('id_troupeau', $troupeau->id)}}
  <br />
  <div class="card carte-param">
    <div>
    <img class="card-img-top" src = '{{URL::asset(config('icones.path'))}}/modifParam.svg' />
  </div>
    <div class="card-body">
      <div class="card-title">
        <h5>Modification des paramètres de cet éleveur</h5>
      </div>
      <div class="container form">
        <div class="form-group">
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
        {{Form::label('vso', 'La VSO est à faire en '.$annee, ['class' => 'form-check-label'])}}
          </div>

          <div class="form-check">
            {{Form::checkbox('bsaimportant', 1 , $troupeau->bsaimportant, ['class' => 'form-check-input'])}}
            {{Form::label('bsaimportant', 'Il faut faire le BSA impérativement', ['class' => 'form-check-label'])}}
          </div>
          <br />
          <div class="form-check">
            {{Form::submit('Enregistrer', ['class' => 'btn btn-success card-link'])}}
            <a href="{{route('troupeau.accueil', $troupeau->id)}}" class="btn btn-danger card-link">Annuler</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  {{Form::close()}}

@endsection()
