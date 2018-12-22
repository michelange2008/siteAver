@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
  <div class="listes-prep-prod">

  <br>
    <div class="alert bandeau">
        <a href="{{URL::previous()}}">
          <img class="retour-vers-prep" src="{{asset(config('fichiers.icones'))}}/retour.svg" alt="">
        </a>
        <h5>
        Liste des {{$liste_produits->count()}} produits ({{$nb_stagiaires}} stagiaires)
      </h5>
        <img id="voir-ou-pas" src="{{asset(config('fichiers.icones'))}}/oeil_ouvert.svg" alt="voir">
    </div>
    @if (session()->has('message'))
      <div class="alert alert-warning">
        <h5>{{session('message')}}</h5>
      </div>
    @endif
    <table class="table tableau">
      @foreach($liste_produits as $produit)
        <tr id="prod_{{$produit->id}}" class="ligne-tableau produit-a-preparer {{$produit->categorie->couleur}}">
          <td>
            <img src="{{asset(config('fichiers.icones'))}}/aromaliste/{{$produit->categorie->icone}}" alt="">
          </td>
          <td>{{$produit->nom}}</td>
          <td class="text-right">{{$produit->quantite_totale}}</td>
          <td style="padding-left:0">{{$produit->unite->abbreviation}}</td>
          <td></td>
        </tr>
      @endforeach
    </table>
    <a href="{{route('antikor.index')}}">
      <button class="akboutons btn btn-sm> "type="button" name="button">retour au sommaire</button>
    </a>
  </div>

@endsection
