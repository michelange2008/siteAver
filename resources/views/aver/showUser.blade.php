@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<br>
<div class="container">
  <h4 class="alert-success">{{ $user->name }}</h4>
  <p>{{ $user->email }}</p>
  <p>{{ $user->ede }}</p>
</div>
@endsection
@section('troupeau')
@component('aver.afficheTroupeau', ['user' => $user, 'troupeaux' => $troupeaux, 'nombreTroupeaux' => $nombreTroupeaux])
@endcomponent
@endsection
