<?php
namespace app\Factories\GestionFevec;

use App\Factories\GestionFevec\CardGestionFevec;

class ListeGestionFevec
{
    protected $liste;

    protected $datas;

    public function __construct()
    {
        $this->liste = collect();

        $datas = [
            [
              "route" => "fevec.videTables",
              "texteBouton" => "Importer",
              "icone" => "importDatabase.svg",
              "titre" => "Importer les tables",
              "texte" => "C'est une procédure qui vide les tables avec préfixe fev_ avant l'import de la nouvelle mise à jour de aver.mdb",
          ],
            [
              "route" => "fevec.normalise",
              "texteBouton" => "Normaliser",
              "icone" => "normalise.svg",
              "titre" => "Normaliser la BDD",
              "texte" => "Procédures pour enlever les clients ni conventionnés ni contractuels. Elimination des troupeaux inutiles (chiens & chevaux). Etc.",
            ],
            [
              "route" => "fevec.import",
              "texteBouton" => "Mettre à jour",
              "icone" => "import.svg",
              "titre" => "Mettre à jour",
              "texte" => "Met à jour la base de données éleveurs et troupeaux à partir de la bdd FEVEC",
            ],
            [
              "route" => "fevec.verifieTroupeaux",
              "texteBouton" => "Vérifier",
              "icone" => "troupeaux.svg",
              "titre" => "Vérifier les troupeaux",
              "texte" => "Vérifie que la base de donnée locale est à jour par rapport à la bdd FEVEC",
            ],
            [
              "route" => "fevec.liste",
              "texteBouton" => "Afficher",
              "icone" => "eleveurs_fevec.svg",
              "titre" => "Liste Eleveurs",
              "texte" => "Affiche l'ensemble des éleveurs conventionnés présents dans la base de donnée du logiciel FEVEC",
            ],
        ];

        foreach($datas as $data)
        {
          $cardGestionFevec = new CardGestionFevec();
          $cardGestionFevec->setBouton($data['route'], $data['texteBouton']);
          $cardGestionFevec->setIcone($data['icone']);
          $cardGestionFevec->setTexte($data['texte']);
          $cardGestionFevec->setTitre($data['titre']);
          $this->liste->push($cardGestionFevec);
        }
    }
    
    public function liste()
    {
        return $this->liste;
    }

}
