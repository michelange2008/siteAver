@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')

@if(session('status'))
<div class="container-fluid">
  <h4 class="alert-success">
      {{ session('status') }}
  </h4>
</div>
@endif
<br />
<div class="container-fluid">
  <div class="row d-flex flex-row justify-content-around">
    <div class="card" style="width:25%">
      <div class="card-body">
        {{ Form::open(['route' => 'fevec.postTelecharge', 'files' => 'true']) }}
        <h5 class="card-title">{{ Form::label('fichier', 'Choisir le fichier à télécharger')}}</h5>
        <p class="card-text">
          {{ Form::file('fichier')}}

          @if($errors->has('fichier') )
          <div class="btn btn-sm btn-warning">{!! $errors->get('fichier')[0] !!}</div>
          @endif()
        </p>

        {{ Form::submit('Ok', ['class' => 'btn btn-success'])}}

        <a href="{{url()->previous()}}" class="btn btn-danger">Annuler</a>

        {{ Form::close()}}
      </div>
      <div class="card-img-bottom">
        <img src="{{URL::asset('medias')}}/icones/fevec/importDatabase.svg" alt="import databases" class="image-min"/>
      </div>
    </div>

    <div class="fleche"></div>

    <div class="card" style="width:25%">

      @if(session('info') === 'telecharge' || session('info') === 'vide' || session('info') === 'import')
      <div class="card-body">
        <h5 card-title>Ok, je vide les bases de données ?</h5>
        <p class="card-text">
          Il s'agit de vider les bases de données intermédiaires qui servent à mettre à jour les bases de données du programme.
        </p>
        <a href="{{route('fevec.videTables') }}" class="btn btn-success">C'est parti</a>
        <a href="{{route('fevec.gestion')}}" class="btn btn-danger">Annuler</a>
      </div>

      <div class="card-img-bottom">
        <img src="{{URL::asset('medias')}}/icones/fevec/videBdd.svg" alt="vider les bdd" class="image-min"/>
      </div>
      @endif()
    </div>

    <div class="fleche"></div>

    <div class="card" style="width:25%">
      @if(session('info') === 'vide' || session('info') === 'import')
      <div class="card-body">
        <h5 card-title>Maintenant j'importe ?</h5>
        <p class="card-text">
          Le programme va maintenant modifier les entêtes originales du fichier importé pour remplir la base de données avec toutes les informations.
        </p>
        <p>
          ça peut durer un  bon moment !
        </p>
        <a href="{{route('fevec.bddAver') }}" class="btn btn-success">C'est parti</a>
        <a href="{{route('fevec.gestion')}}" class="btn btn-danger">Annuler</a>
      </div>

      <div class="card-img-bottom">
        <img src="{{URL::asset('medias')}}/icones/fevec/ecritBdd.svg" alt="vider les bdd" class="image-min"/>
      </div>

      @endif()
    </div>
  </div>
  <br />
  <div class="d-flex flex-row justify-content-between">
    @include('flash::message')
  </div>
  @if(session('info') === 'import')
  <br />
  <div class="row">
    <div class="col-sm">

    </div>

    <div class="col-sm">
      <div class="card">
        <div class="card-img-top">
          <img src="{{URL::asset('medias')}}/icones/fevec/finImport.svg" alt="fin" class="image-min"/>
        </div>
        <div class="card-body">
          <h5 class="card-title">L'importation est maintenant terminée</h5>
          <a href="{{route('fevec.gestion')}}" class="btn btn-secondary">Retour</a>
        </div>
      </div>
    </div>
    <div class="col-sm">
    </div>

  </div>
@endif()
</div>
@endsection()
