@extends('layouts.app')
@extends('aver.menuAver')

@section('content')
  <div class="container col-sm-offset-3 col-sm-6 ">
    <div class="alert alert-success">Modifier le troupeau</div>
      <div class="container">
        <div class="form-group col-sm-6">
          {!! Form::open(['route' => ['troupeau.update', $troupeau->id], 'method' => 'PATCH' ] ) !!}
          {{ csrf_field() }}
            {!! Form::hidden('id', $troupeau->id) !!}
            {!! Form::label('especes', 'Atelier') !!}
            {!! Form::select('especes', $especes, $troupeau->especes['id'], ['class' => "form-control"]) !!}

            {!! Form::label('races', 'Race') !!}
            {!! Form::select('races', $races, $troupeau->races['id'], ['class' => "form-control"]) !!}

            {!! Form::label('production', 'Production') !!}
            {!! Form::select('productions', $productions, $troupeau->productions['id'], ['class' => "form-control"]) !!}

            {!! Form::label('effectif', 'Effectif (animaux adultes)') !!}
            {!! Form::text('effectif', $troupeau->effectif, ['class' => 'form-control']) !!}

            {!! Form::label('uiv', 'UIV') !!}
            {!! Form::text('uiv', $troupeau->uiv, ['class' => 'form-control']) !!}

            {!! Form::submit('Enregistrer les modifications', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
        </div>
      </div>
  </div>
@endsection
