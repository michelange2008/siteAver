@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="fond">
  <div class="eleveur">
    <div class="alert bandeau">
      <h3>Trouver un éleveur</h3>
    </div>
    <span id='lien_troupeau' class="invisible">{{route('troupeau.accueil')}}</a></span>
    <input id="chercher_eleveur" class="form-control mr-sm-2" type="text" name="search" placeholder="chercher" value="">
    <div class="ak_liste_eleveurs">

    </div>
  </div>
  <div id="info">
    <div class="alert bandeau">
      <h3>Informations</h3>
    </div>
    <div id="info-contenu">
      <table class="table table-striped table-focus">
        <tbody>
          @foreach ($listeInfos as $intitule => $valeur)
            <tr>
              <td class="intitule">{{$intitule}}</td>
              <td class="valeur">{{$valeur}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div id="liens">
    <div class="alert bandeau">
      <h3>Liens</h3>
    </div>
    <div id="liens-contenu">
      @foreach ($listeLiens as $liens)
        <div id="{{$liens->nom()}}" class="etiquette">
          <a href="{{$liens->url()}}">
            <img src="{{config('fichiers.icones')}}antikor/{{$liens->icone()}}" alt="{{$liens->nom()}}">
            <h5>{{$liens->nom()}}</h5>
          </a>
        </div>
      @endforeach
  </div>
</div>

@endsection
