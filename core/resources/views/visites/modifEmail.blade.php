@extends('layouts.app')

@section('content')

  <div class="container-fluid bg-success">
    <h1 class="text-light titre-non-coupe">Ajout ou modification d'une adresse mail</h1>
  </div>
{{Form::open(['route' => 'envoiPs.storeEmailUser'])}}
  <div class="">
    <p>Il semble que cet éleveur n'ait pas d'email valide</p>
    <p>Merci d'en saisir un:</p>
    <input type="mail" name="email" value="" placeholder="{{$user->email}}" required>
    <input type="submit" class="btn btn-success" name="OK" value="Envoyer">
    <input type="reset" class="btn btn-danger" name="OK" value="Annuler">
  </div>
{{Form::close()}}
@endsection
