<?php

namespace App\Repositories\Fevec;

use App\Factories\Sousmenu\SousmenuItem;
use App\Factories\Sousmenu\SousmenuFactory;
use App\Factories\Sousmenu\SousmenuCouleurs;

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
    

}
