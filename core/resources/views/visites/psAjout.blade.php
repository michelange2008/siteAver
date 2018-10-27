@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="container-fluid bg-success espace-lg espace-bas">
  <h4 class="text-light">Ajout d'un protocole de soins</h4>
</div>
<br />
<div class="row">

  <div class="col-sm-4">

  </div>
  <div class="col-sm-4">
    {{ Form::open(['route' => 'ps.store', 'enctype' => 'multipart/form-data'])}}
    <div class="form-group">
      {{ Form::label('nom', 'Nom du protocole de soin')}}
      {{ Form::text('nom'), ['class' => 'form-control']}}
    </div>
      @if($errors->has('nom') )
        <div class="btn btn-sm btn-warning">{!! $errors->get('nom')[0] !!}</div>
      @endif()

    <div class="form-group">
      {{ Form::label('fichier', 'Fichier à télécharger')}}
      {{ Form::file('fichier')}}
    </div>
    @if($errors->has('fichier') )
      <div class="btn btn-sm btn-warning">{!! $errors->get('fichier')[0] !!}</div>
    @endif()

    @foreach($listeEspeces as $espece)
    <div class="form-check ">
      {{ Form::checkbox($espece->id, $espece->nom, ['class' => 'form-check-input'])}}
      {{ Form::label('case_cochee_'.$espece->id, $espece->nom, ['class' => 'form-check-label'])}}
    </div>
    @endforeach()

    <div class="form-group">
      {{Form::submit('Enregistrer', ['class' => 'btn btn-success'])}}
      <a href="{{url()->previous()}}" class="btn btn-danger">Annuler</a>
    </div>

    {{ Form::close()}}

  </div>
</div>
@endsection()
