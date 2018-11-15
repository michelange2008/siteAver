<?php

namespace App\Http\Controllers\Antikor\Aromaliste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aromaliste\Aromformation;
use App\Models\Aromaliste\Arompreparation;
use App\Models\Aromaliste\Aromproduit;
use App\Models\Aromaliste\Arompreparation_Aromproduit;
use App\Constantes\ConstCategoriesProduits;
use App\Traits\ArronditProduits;

class AromalisteController extends Controller
{

    use ArronditProduits;

    public function index()
    {
      return view('antikor.aromaliste.aromalisteAccueil', [
        'formations' => Aromformation::all(),
        'preparations' => Arompreparation::all(),
      ]);
    }

    /*
    // Récupère via POST (view aromalisteAccueil) la liste des préparations pour lesquelles on veut
    // établir une liste de produits
    */
    public function choix(Request $request)
    {
      $nb_stagiaires = $request->all()['nb']; // récupère le nombre de stagiaires

      $liste_prep_id = [];

      foreach ($request->all() as $key => $value) {
        if(substr($key, 0, 2) === "cb" && $value === "1")
        {
          $liste_prep_id[] = explode("_", $key)[1];
        }
      }

      $liste_produits = collect();

      $produits = Aromproduit::orderBy('categorie_id')->get(); // récupère la liste de tous les produits

      $nb_he = 0;

      foreach ($produits as $produit) { // boucle dessus
        // On extraie de la bdd les lignes correspondant au produit et à la préparation (issue du POST de typ cb_xx)
        // et on fait la somme de la quantité
        $quantite_par_stagiaire = Arompreparation_Aromproduit::whereIn('arompreparation_id', $liste_prep_id)
                                                  ->where('aromproduit_id', $produit->id)
                                                  ->sum('quantite');
        // on multiplie la quantité de produit par le nombre de stagiaires
        $quantite_totale = $quantite_par_stagiaire * $nb_stagiaires;
        // si le produit est présent (cad quantite_totale > 0)
        if($quantite_totale > 0)
        {
          if($produit->categorie->abbreviation === ConstCategoriesProduits::HUILE_ESSENTIELLE )
          {
            $nb_he++;
          }
          // on ajoute cette quantité à l'objet produit
          $produit->quantite_totale = $quantite_totale;
          // on ajoute ce produit avec sa quantite à la liste
          $liste_produits->push($this->arrondiProduits($produit));
        }
      }
      if($nb_he > 0)
      {
        $seringue = Aromproduit::find(ConstCategoriesProduits::SERINGUE);
        $seringue->quantite_totale = $nb_he;
        $liste_produits->push($seringue);
      }
      if(count($liste_produits) === 0)
      {
        session()->flash('message', 'La liste est vide !');
      }
      return view('antikor.aromaliste.listeproduits', [
        'liste_produits' => $liste_produits,
        'nb_stagiaires' => $nb_stagiaires,
      ]);
    }
}
