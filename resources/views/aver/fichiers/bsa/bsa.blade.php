@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
<div class="container-fluid bg-success d-flex flex-row sous-ruban">
    <a href="{{route('troupeau.accueil', $troupeau->id)}}" title="revenir à la liste des éleveurs">
      <img class="image-h" src="{{URL::asset('medias')}}/icones/retour.svg" alt="retour" />
    </a>
    <h1>Bilans sanitaires annuels</h1>
</div>
<br />
<div class="container-fluid d-flex flex-row justify-content-around">
    @foreach($bsas as $bsa)
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                {{$bsa->date_bsa}}
            </div>
            @foreach($bsa->pss as $ps)
                <div class="card-text">
                    {{$ps->nom}} <a href="{{route('ps.affiche', [$troupeau->user->id, $bsa->id, $ps->id])}}">Télécharger</a>
                </div>
            @endforeach()
        </div>
    </div>
    @endforeach()
</div>
@endsection()