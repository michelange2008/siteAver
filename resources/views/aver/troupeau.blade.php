@extends('layouts.app')
@extends('aver.menuAver')

@section('content')
  <br>
  <div class="col-sm-offset-3 col-sm-6">
    @if(session()->has('ok'))
      <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Liste des troupeaux</h3>
      </div>
        <table class="table">
          <tbody>
            @foreach($troupeaux as $troupeau )
            <tr>
              <td class="text-dark"><strong>{!! $troupeau->especes['nom'] !!} ({!! $troupeau->races['nom'] !!})</strong></td>
              <td>{!! link_to_route('troupeau.show', 'Voir', [$troupeau['id']], ['class' => 'btn btn-success btn-block']) !!}</td>
              <td>{!! link_to_route('troupeau.edit', 'Modifier', [$troupeau['id']], ['class' => 'btn btn-warning btn-block']) !!}</td>
              <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['troupeau.destroy', $troupeau['id']]]) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce troupeau ? \')']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {!! link_to_route('troupeau.create', 'Ajouter un troupeau', [], ['class' => 'btn btn-info pull-right']) !!}
  </div>
@endsection
