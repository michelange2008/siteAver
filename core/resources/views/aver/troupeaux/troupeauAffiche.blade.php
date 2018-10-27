@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'admin' => $admin,
  'listeSceaux' => $listeSceaux,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'campagne' => $campagne,
])

@section('content')
@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()

<br />
<div class="container d-flex flex-row justify-content-between">
  @foreach($listeSceaux->listeSceaux() as $sceau)
  @if($sceau->type() === App\Constantes\ConstSceaux::TYPE_LIEN)
    <div class="card card-troupeau-admin">
      <img class="card-img-top" src="{{URL::asset('medias').$sceau->icone()}}" alt="{{$sceau->icone()}}" style="width:50px"/>
      <div class="card-body card-cadre d-flex flex-column justify-content-between">
        <h5 class="card-title">{{ucfirst($sceau->titre())}}</h5>
        <p class = "card-text">
          {{$sceau->texte()}}
        </p>
        <p class="card-text italique">
            {{$sceau->parametre()}} {{$sceau->titre()}}
        </p>
        @if(!$sceau->affichage())
          <div class = 'btn btnsecondary'> </div>
        @else()
          {{ link_to_route($sceau->bouton()->route(), ucfirst($sceau->bouton()->texte()), ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $sceau->bouton()->couleur().' btn'])}}
        @endif()
      </div>

    </div>

@endif()
  @endforeach()
</div>
@endsection()
