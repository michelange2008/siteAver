<?php

namespace App\Repositories;

use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuFactory;
use App\Factories\Sousmenu\SousmenuCouleurs;
use App\Constantes\ConstAnimaux;

class FevecSousmenuRepository
{

  public static function sousmenuGestion()
  {
    $listeMenu = new SousmenuFactory('Gestion des données du logiciel FEVEC');
    $toutMaJ = new SousmenuItem('fevec.maj', 'Tout mettre à jour', SousmenuCouleurs::VERT, "Fait toute la procédure d'importation et de normalisation en un clic");
    $listeMenu->addSousmenuItem($toutMaJ);
    $param = new SousmenuItem('fevec.param', 'Paramètres', SousmenuCouleurs::ORANGE, "Permet de choisir quels types d'éleveurs et d'espèces on veut garder");
    $listeMenu->addSousmenuItem($param);
    $retour = new SousmenuItem('fevec.index', 'Retour à l\'accueil', SousmenuCouleurs::GRIS);
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

  public static function sousmenuNormalise()
  {
    $listeMenu = new SousmenuFactory('Normalisation de la base FEVEC terminée');
    $toutMaJ = new SousmenuItem('fevec.import', 'Passer à la suite ...', SousmenuCouleurs::VERT);
    $listeMenu->addSousmenuItem($toutMaJ);
    $retour = new SousmenuItem('fevec.gestion', 'Retourner à l\'accueil', SousmenuCouleurs::GRIS);
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

  public static function rienASupprimer()
  {
    $listeMenu = new SousmenuFactory('Normalisation de la base FEVEC terminée');
    $toutMaJ = new SousmenuItem('fevec.verifieTroupeaux', 'Passer à la suite ...', SousmenuCouleurs::VERT);
    $listeMenu->addSousmenuItem($toutMaJ);
    $retour = new SousmenuItem('fevec.gestion', 'Retourner à l\'accueil', SousmenuCouleurs::GRIS);
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

    public static function verifieTroupeaux()
    {
      $listeMenu = new SousmenuFactory('Voici les modifications effectuées sur les troupeaux:');
      $retour = new SousmenuItem('fevec.index', 'Retourner à l\'accueil', SousmenuCouleurs::GRIS);
      $listeMenu->addSousmenuItem($retour);

      return $listeMenu;
    }
    
    public static function paramImport()
    {
        $listeMenu = new SousmenuFactory("Définir les parametres d'importation:");
        $annuler = new SousmenuItem('fevec.gestion', 'Retour sans enregistrer', SousmenuCouleurs::GRIS);
        $listeMenu->addSousmenuItem($annuler);
        
        return $listeMenu;
    }
    
    public static function vetsan()
    {
      $listeMenu = new SousmenuFactory('Eleveurs dont nous sommes (ou non) vétérinaires sanitaires:');
      $majVetsan = new SousmenuItem('visite.majVetsan', 'Vet. san.', SousmenuCouleurs::BLEU, "Met que l'on est vétérinaire sanitaire des éleveurs en convention");
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

}
