@extends('layouts.app')
@extends('aver.menuAver')

@section('content')
<div class="container col-sm-offset-3 col-sm-6 espace-lg">
  <div class="alert alert-success"><h4 class="alert-heading">Ajouter un nouvel éleveur</h4></div>
    <div class="container">
      <div class="form-group">
        {!! Form::open(['route' => 'user.store']) !!}
          {{ csrf_field() }}

          {!! Form::text('name', '', ['placeholder' => "nom de l'éleveur", 'class' => 'form-control']) !!}
          <br>
          {!! Form::password('password', ['placeholder' => "mot de passe", 'class' => 'form-control']) !!}
          <br>
          {!! Form::email('email', '', ['placeholder' => 'Email', 'class' => 'form-control']) !!}
          <br>
          {!! Form::text('ede', '', ['class' => 'form-control', 'placeholder' => "Numéro EDE"]) !!}
          <br>
          {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
          {!! Form::reset('Annuler', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}
</div>
@endsection
