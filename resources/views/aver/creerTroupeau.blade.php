@extends('layouts.app')
@extends('aver.menuAver')

@section('content')
<div class="container col-sm-offset-3 col-sm-6 ">
  <div class="alert alert-success">Créer un nouveau troupeau</div>
    <div class="container">
      <div class="form-group col-sm-6">
        {!! Form::open(['route' => 'troupeau.store']) !!}
  {{ csrf_field() }}

    {!! Form::hidden('userId', $userId) !!}

    {!! Form::label('especes', 'Atelier') !!}
    {!! Form::select('especes', $especes, '' ,['class' => 'form-control']) !!}

    {!! Form::label('races', 'Race') !!}
    {!! Form::select('races', $races, '', ['class' => 'form-control']) !!}

    {!! Form::label('productions', 'Production') !!}
    {!! Form::select('productions', $productions, '', ['class' => 'form-control']) !!}

    {!! Form::label('effectif', 'Effectif (animaux adultes)') !!}
    {!! Form::text('effectif', 0, ['class' => 'form-control']) !!}

    {!! Form::label('uiv', 'UIV') !!}
    {!! Form::text('uiv', 0, ['class' => 'form-control']) !!}

    {!! Form::submit('Enregistrer les modifications', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}
</div>
@endsection
