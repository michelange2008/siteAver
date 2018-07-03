@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<div class="container-fluid">
  <h3 class="alert alert-success">FEVEC</h3>
  <table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr><th>Nom</th><th>EDE</th><th>Email</th><th>Troupeaux</th><th></th>
    </thead>

  @foreach($listeEleveurs as $eleveur)
  <tr>
  <td>{{ $eleveur->name}}</td>
  <td>{{ $eleveur->ede}}</td>
  <td>{{ $eleveur->email}}</td>
  @foreach($listeTroupeaux as $troupeau)
    @if($troupeau->user_id == $eleveur->id)
      <td class="{{str_replace(' ', '_', $troupeau->especes->nom)}}">{{ $troupeau->especes->nom }}
        @if($troupeau->races == null)
        @else
          ({{ $troupeau->races->nom }})
        @endif
      </td>
    @endif
  @endforeach
  </tr>
  @endforeach
</div>
</table>
@endsection
