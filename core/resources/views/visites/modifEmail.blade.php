@extends('layouts.app')

@section('content')

  <div class="container-fluid bg-success">
    <h1 class="text-light titre-non-coupe">Ajout ou modification d'une adresse mail</h1>
  </div>
{{Form::open(['route' => 'envoiPs.storeEmailUser'])}}
  <div class="">
    <p>Il semble que cet éleveur n'ait pas d'email valide</p>
    <p>Merci d'en saisir un:</p>
    <input id="email" type="mail" name="email" value="" placeholder="{{$troupeau->user->email}}" required>
    <div class="">
      <input id="validEmailOk" type="submit" class="btn btn-success" name="OK" value="Envoyer">
      <input type="hidden" name="troupeau" value="{{$troupeau->id}}">
      <input type="hidden" name="bsa" value="{{$bsa->id}}">
      <input type="hidden" name="ps" value="{{$ps->id}}">
      <a href="{{route('bsa.ps', ['troupeau_id' => $troupeau->id, 'bsa_id' => $bsa->id])}}" class="btn btn-danger">Annuler</a>
    </div>
  </div>
{{Form::close()}}
<svg class="loader invisible" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
   <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
   <circle cx="170" cy="170" r="135" stroke="#404041"/>
   <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
   <circle cx="170" cy="170" r="85" stroke="#404041"/>
</svg>
@endsection
