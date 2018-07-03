@extends('layouts.app')

@section('content')
<div class="container col-sm-offset-3 col-sm-6 ">
  <div class="alert alert-success">Créer un nouveau troupeau</div>
    <div class="container">
      <div class="form-group col-sm-6">
  {!! Form::open(['route' => 'troupeau.index']) !!}
  {{ csrf_field() }}
    {!! Form::label('especes', 'Atelier') !!}
    {!! Form::select('especes', $especes, '' ,['class' => 'form-control']) !!}
    <br>
    {!! Form::label('races', 'Race') !!}
    {!! Form::select('races', $races, '', ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('productions', 'Production') !!}
    {!! Form::select('productions', $productions, '', ['class' => 'form-control']) !!}
    <br>
    {!! Form::submit('Enregistrer les modifications', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}
</div>
@endsection
