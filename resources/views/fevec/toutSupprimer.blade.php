@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<div class="container">
  <h4 class="alert alert-warning">Je viens de supprimer {{ $nbSuppr }} éleveurs</h4>
  {{ link_to_route('fevec.index', "Retour au sommaire", '', ['class' => 'btn btn-sm btn-warning']) }}
  {{ link_to_route('fevec.index', "Ok on continue ...", '', ['class' => 'btn btn-sm btn-success']) }}

@endsection
