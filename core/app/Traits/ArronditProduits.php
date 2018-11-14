<?php
namespace App\Traits;

use App\Models\Aromaliste\Aromcategorie;

/**
 * Permet d'arrondir les quantité en fonction de la nature du produit
 */
trait ArronditProduits
{
  function arrondiProduits($produit)
  {
    $categorie = Aromcategorie::find($produit->categorie->id);
    $quantite_arrondi = round($produit->quantite_totale, $categorie->arrondi);
    return number_format($quantite_arrondi, $categorie->arrondi, ",", "");
  }
}
