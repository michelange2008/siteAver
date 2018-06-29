<?php

/*
 * permet la construction des sous-menu concernant les visites: vetsan, prophylo, etc.
 */

namespace App\Repositories\Visites;

/**
 * Description of VisitesSousMenuRepository
 *
 * @author michel
 */

use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuFactory;
use App\Factories\Sousmenu\SousmenuCouleurs;

use App\Constantes\ConstAnimaux;

class VisitesSousMenuRepository
{
    public static function visitesAccueil()
    {
        $listeMenu = new SousmenuFactory('Gestion des visites, prophylaxies, bilans sanitaires, etc.');
        $retour = new SousmenuItem('fevec.index', 'Retour', SousmenuCouleurs::GRIS);
        $listeMenu->addSousmenuItem($retour);

        return $listeMenu;
    }

    public static function vetsan()
    {
      $listeMenu = new SousmenuFactory('Eleveurs dont nous sommes (ou non) vétérinaires sanitaires:');
      $majVetsan = new SousmenuItem('vetsan.majVetsan', 'Vet. san.', SousmenuCouleurs::BLEU, "Met que l'on est vétérinaire sanitaire des éleveurs en convention");
      $listeMenu->addSousmenuItem($majVetsan);
      $retour = new SousmenuItem('fevec.index', 'Retour', SousmenuCouleurs::GRIS);
      $listeMenu->addSousmenuItem($retour);

      return $listeMenu;
        
    }
    
    public static function prophyloSommaire()
    {
      $listeMenu = new SousmenuFactory('Gestion des prophylaxies');
      $majProphylo = new SousmenuItem('prophylo.index', 'Prophylo', SousmenuCouleurs::BLEU, "Met à jour les prophylaxies");
      $listeMenu->addSousmenuItem($majProphylo);
      $retour = new SousmenuItem('fevec.index', 'Retour', SousmenuCouleurs::GRIS);
      $listeMenu->addSousmenuItem($retour);

      return $listeMenu;
        
    }

    public static function prophyloChanger()
    {
      $listeMenu = new SousmenuFactory('Gestion des prophylaxies');
      $route = 'prophylo.changer';
      $listeItem = [
          [
              'route' => $route,
              'titre' => ConstAnimaux::BV_long,
              'couleur' => SousmenuCouleurs::NAVY,
              'bulle' => 'gérer les prophylaxies bovines',
              'parametre' => ConstAnimaux::BV,
          ],
          [
              'route' => $route,
              'titre' => ConstAnimaux::PR_long,
              'couleur' => SousmenuCouleurs::GOLD,
              'bulle' => 'gérer les prophylaxies ovines et caprines',
              'parametre' => ConstAnimaux::PR,
          ],
          [
              'route' => $route,
              'titre' => ConstAnimaux::BC_long,
              'couleur' => SousmenuCouleurs::ROSE,
              'bulle' => 'gérer les autres prophylaxies',
              'parametre' => ConstAnimaux::BC,
          ],
          [
              'route' => 'fevec.index',
              'titre' => 'Retour',
              'couleur' => SousmenuCouleurs::GRIS,
              'bulle' => 'retour à l\'accueil',
              'parametre' => ''
          ],
      ];
      foreach ($listeItem as $item)
      {
          $prophylo = new SousmenuItem($item['route'], $item['titre'], $item['couleur'], $item['bulle'], $item['parametre']);
          $listeMenu->addSousmenuItem($prophylo);
      }

      return $listeMenu;
        
    }
    
    public static function bsaAccueil()
    {
        $listeMenu = new SousmenuFactory('Gestion des bilans sanitaires annuels');
        $retour = new SousmenuItem('fevec.index', 'Retour', SousmenuCouleurs::GRIS);
        $listeMenu->addSousmenuItem($retour);

        return $listeMenu;
    }

    public static function vsoAccueil()
    {
        $listeMenu = new SousmenuFactory('Gestion des visites obligatoires');
        $retour = new SousmenuItem('visites.accueil', 'Retour', SousmenuCouleurs::GRIS);
        $listeMenu->addSousmenuItem($retour);

        return $listeMenu;
    }

}
