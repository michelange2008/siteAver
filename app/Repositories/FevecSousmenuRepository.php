<?php

namespace App\Repositories;

use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuFactory;

class FevecSousmenuRepository
{

  public static function sousmenuGestion()
  {
    $listeMenu = new SousmenuFactory('Gestion des données du logiciel FEVEC');
    $toutMaJ = new SousmenuItem('fevec.maj', 'Tout mettre à jour', 'vert', "Fait toute la procédure d'importation et de normalisation en un clic");
    $listeMenu->addSousmenuItem($toutMaJ);
    $param = new SousmenuItem('fevec.param', 'Paramètres', 'orange', "Permet de choisir quels types d'éleveurs et d'espèces on veut garder");
    $listeMenu->addSousmenuItem($param);
    $majVetsan = new SousmenuItem('fevec.majVetsan', 'Vet. san.', 'bleu', "Met que l'on est vétérinaire sanitaire des éleveurs en convention");
    $listeMenu->addSousmenuItem($majVetsan);
    $retour = new SousmenuItem('fevec.index', 'Retour à l\'accueil', 'gris');
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

  public static function sousmenuNormalise()
  {
    $listeMenu = new SousmenuFactory('Normalisation de la base FEVEC terminée');
    $toutMaJ = new SousmenuItem('fevec.import', 'Passer à la suite ...', 'vert');
    $listeMenu->addSousmenuItem($toutMaJ);
    $retour = new SousmenuItem('fevec.gestion', 'Retourner à l\'accueil', 'gris');
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

  public static function rienASupprimer()
  {
    $listeMenu = new SousmenuFactory('Normalisation de la base FEVEC terminée');
    $toutMaJ = new SousmenuItem('fevec.verifieTroupeaux', 'Passer à la suite ...', 'vert');
    $listeMenu->addSousmenuItem($toutMaJ);
    $retour = new SousmenuItem('fevec.gestion', 'Retourner à l\'accueil', 'gris');
    $listeMenu->addSousmenuItem($retour);

    return $listeMenu;
  }

    public static function verifieTroupeaux()
    {
      $listeMenu = new SousmenuFactory('Voici les modifications effectuées sur les troupeaux:');
      $retour = new SousmenuItem('fevec.index', 'Retourner à l\'accueil', 'gris');
      $listeMenu->addSousmenuItem($retour);

      return $listeMenu;
    }
    
    public static function paramImport()
    {
        $listeMenu = new SousmenuFactory("Définir les parametres d'importation:");
        $annuler = new SousmenuItem('fevec.gestion', 'Retour sans enregistrer', 'gris');
        $listeMenu->addSousmenuItem($annuler);
        
        return $listeMenu;
    }
    
    public static function vetsan()
    {
      $listeMenu = new SousmenuFactory('Eleveurs dont nous sommes (ou non) vétérinaires sanitaires:');
      $retour = new SousmenuItem('fevec.index', 'Retour', 'gris');
      $listeMenu->addSousmenuItem($retour);

      return $listeMenu;
        
    }
}
