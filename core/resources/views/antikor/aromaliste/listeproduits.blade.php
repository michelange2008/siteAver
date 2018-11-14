@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
  <br>
    <div class="alert bandeau">
      <h5>Liste des produits ({{$nb_stagiaires}} stagiaires)</h5>
    </div>
    <table class="table table-striped table-hover">
      @foreach($liste_produits as $produit)
        <tr>
          <td>{{$produit->nom}} ({{$produit->unite->abbreviation}})</td>
          <td class="text-right">{{$produit->quantite_totale}}</td>
          <td></td>
        </tr>
      @endforeach
    </table

@endsection
