@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
  <br>
    <div class="alert bandeau">
      <h5>
        <a href="{{URL::previous()}}">
          <img class="retour-vers-prep" src="{{asset(config('fichiers.icones'))}}/retour.svg" alt="">
        </a>
        Liste des {{$liste_produits->count()}} produits ({{$nb_stagiaires}} stagiaires)
      </h5>
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
    </table

@endsection
