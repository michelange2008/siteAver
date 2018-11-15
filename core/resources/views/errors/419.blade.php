@extends('layouts.app')


<div class="message-error">
  <h1>La session a expiré</h1>
  <a href="{{route('login')}}">
    <button class="btn btn-danger rounded-0" type="button" name="button">retour</button>
  </a>
</div>
<img class="img-error" src="{{asset(config('fichiers.icones'))}}/disconnect.svg" alt="expire">
