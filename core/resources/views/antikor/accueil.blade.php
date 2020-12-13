@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')


@section('content')

  <div class="container-fluid">

    <div class="row">

      <div class="col-md-8">

        <div class="alert-success p-3">

          <h3>Trouver un éleveur</h3>

        </div>

        <div class="my-3">

          <span id='lien_troupeau' class="invisible">{{route('troupeau.accueil')}}</a></span>
          <input id="chercher_eleveur" class="form-control mr-sm-2" type="text" name="search" placeholder="chercher" value="">
          <div class="ak_liste_eleveurs">

          </div>

        </div>

      </div>

      <div class="col-md-4">

        <div class="alert-success p-3">

          <h3>Liens</h3>

        </div>

        <div class="my-3">
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

    </div>

    <div class="row">

      <div class="col-md-4 offset-md-8">

        <div class="alert-success p-3 my-3">

          <h3>Informations</h3>

        </div>

        <div id="info-contenu my-3">
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

    </div>

  </div>

@endsection
