@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'listeSceaux' => $listeSceaux,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'nombreDeTroupeau' => $nombreDeTroupeau,
  'campagne' => $campagne,
])

@section('content')
@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()

<br />
<div class="analyse-bsps">
  @foreach($listeSceaux->listeSceaux() as $sceau)
  @if($sceau->type() === App\Constantes\ConstSceaux::TYPE_LIEN)
    <div class="carte">
      <div class="carte-titre">
        <div class="carte-titre-icone">
          <img src="{{URL::asset(config('fichiers.icones')).$sceau->icone()}}" alt="{{$sceau->icone()}}"/>
        </div>
        <div class="carte-titre-texte">
          <h5>{{ucfirst($sceau->titre())}}</h5>
        </div>
      </div>
      <div class="carte-main">
          <p class>
            {{$sceau->texte()}}
          </p>
          <p>
            {{$sceau->parametre()}} {{$sceau->titre()}}
          </p>
          @if($sceau->parametre() == 0)
            <div class = 'btn btn-secondary carte-bouton'>...</div>
          @else()
            {{ link_to_route($sceau->bouton()->route(), ucfirst($sceau->bouton()->texte()), ["user_id" => $troupeau->user_id, "troupeau_id" => $troupeau->id], ['class' => $sceau->bouton()->couleur().' btn carte-bouton'])}}
          @endif()
      </div>
    </div>

@endif()
  @endforeach()
</div>
@endsection()
