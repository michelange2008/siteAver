@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('home')}}" title="revenir à l'accueil">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1>Bilans sanitaires annuels</h1>
</div>
<br />

@endsection()
