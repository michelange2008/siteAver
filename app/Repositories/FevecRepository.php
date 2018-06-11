<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Troupeau;
use App\Repositories\UsersRepository;
use App\Models\ParamModels;
use App\Models\Fev_clients;
use App\Models\Fev_troupeaux;
use App\Models\Fev_eleveurs_n;
use App\Models\Fev_troupeaux_n;
use App\Models\Fev_TypeActivite;
use App\Models\Fev_typetroupeaux;
use App\Models\Activite;
use App\Models\Especes;
use App\Factories\Graphiques;
use App\Factories\StatFactory;
use App\Traits\RemplaceCaract;

const CONVENTION = 1;
const CONTRAT = 5;

class FevecRepository
{
  use RemplaceCaract;
  
  protected $clientFevec;
  protected $troupeauFevec;

  public function __construct(Fev_clients $clientFevec, Fev_troupeaux $troupeauFevec, UsersRepository $usersRepository)
  {
    $this->clientFevec = $clientFevec;
    $this->troupeauFevec = $troupeauFevec;
    $this->usersRepository = $usersRepository;
  }
  public function getTousClientsReduits() // Garde seulement les colonnes interessantes
  {
    return Fev_clients::select('CodeClient', 'NomClient', 'email', 'NumeroEDE', 'Estconventionné')->get();
  }

  public function getTroupeauInteret() // sans les chiens, les chevaux de monte ou de boucherie ou la faune sauvage...
  // et soit conventionnés soit contractuels
  {
      $activite = new Activite();
      $especes = new Especes();
    return Fev_troupeaux::select('CodeTroupeau', 'CodeClient', 'TypeActivite', 'TypeTroupeau', 'RaceDominante', 'uiv')
                        ->whereIn('TypeActivite', self::getParamUtile($activite) )
                        ->whereIn('TypeTroupeau', self::getParamUtile($especes))
                        ->get();
  }
  
  public static function getParamUtile(ParamModels $model)
  {
      $listeparamUtile = [];
      $paramUtile = $model->where('utile', true)->get();
      foreach ($paramUtile as $param)
      {
          $listeparamUtile[] = $param->id;
      }
      return $listeparamUtile; 
  }

    public function listeEleveurs()
  {
    $eleveursFevec = Fev_eleveurs_n::all();
    return $eleveursFevec;
  }
  
  public function listeTroupeaux()
  {
    $troupeauxFevec = Fev_troupeaux_n::all();
    return $troupeauxFevec;
  }

// METHODES QUI REFLETENT LES METHODES DE FEVECCONTROLLER #############################################
// LISTE LES ELEVEURS FEVEC#####################################################
  public function listeFevecAvec()
  {
    $listeFevecAver = [];
    $listeFevecAver['eleveurs'] = $this->listeEleveurs();
    $listeFevecAver['troupeaux'] = $this->listeTroupeaux();
    $troupeaux = Fev_troupeaux_n::all();
    foreach($troupeaux as $troupeau)
    {
      $troupeau_detail = Fev_troupeaux_n::find($troupeau->id);
      $detail[$troupeau->id] = $troupeau_detail;
    }
    $listeFevecAver['detail'] = $detail;
    return $listeFevecAver;
  }
// NORMALISE LA BDD AVER (REMPLIT LES BDD Fev_eleveurs_n et Fev_troupeaux_n)####
  public function fevecNormalise()
  {
    $this->transfertActivite();
    $troupeauxFevec = $this->getTroupeauInteret();
    $troupeauxFevec = $this->normaliseListeCodeTroupeaux($troupeauxFevec);
    $clientsFevec = $this->modifierEstconventionne($troupeauxFevec);
    $this->remplitTableEleveurs($clientsFevec);
    $troupeauxFevec = $this->elimineTroupeauxSansClient($troupeauxFevec);
    $this->remplitTableTroupeaux($troupeauxFevec);
  }
  // SOUS-METHODES POUR LA METHODE FEVECNORMALISE
    private function transfertActivite() // Copie la base Fev_activite dans la base Activite et rajoute une abbréviation
    {
        $typeActivites = Fev_TypeActivite::select('Cle', 'LibelleActivite')->get();
        foreach ($typeActivites as $typeActivite )
        {
            $inputs['nom'] = $typeActivite->LibelleActivite;
            // Création de l'abbreviation en enlevant les accents
            $inputs['abbreviation'] = strtoupper(substr($this->suppr_accents($typeActivite->LibelleActivite), 0, 4)); // puis en prenant les 4 1ères lettres en capitale
            
            Activite::where('id', $typeActivite->Cle)->update($inputs);
        }
    }
    private function normaliseListeCodeTroupeaux($troupeauxFevec) // Enlève les tirets et transforme les string en int pour les id troupeaux
    {
      foreach ($troupeauxFevec as $troupeauFevec) {
        $this->normaliseCodeTroupeau($troupeauFevec);
      }
      return $troupeauxFevec;
    }
      private function normaliseCodeTroupeau($troupeauFevec) // Enlève les tirets et transforme les string en int pour l'id d'un troupeau
      {
        $troupeauFevec->CodeTroupeau = intval(str_replace('-', '', $troupeauFevec->CodeTroupeau));
        $troupeauFevec->CodeClient = intval($troupeauFevec->CodeClient);
        return $troupeauFevec;
      }
    public function modifierEstconventionne($troupeauxFevec) // Attribue les indices 1 ou 5 aux éleveurs (convention ou suivi)
    {
      $clientsFevec = $this->getTousClientsReduits();

      foreach($clientsFevec as $clientFevec)
      {
        foreach ($troupeauxFevec as $troupeauFevec) {
          if($troupeauFevec->CodeClient == $clientFevec->CodeClient)
          {
              $clientFevec->Estconventionné = $troupeauFevec->TypeActivite;
          }
        }
        if(in_array($clientFevec->Estconventionné, self::getParamUtile(new Activite())))
        {
          $clientsFevecReduit[] = $clientFevec;
        }
      }
      return $clientsFevecReduit;
    }
      public function remplitTableEleveurs($clientsFevec) // vide puis remplit la table intermédiaire avec les éleveurs normalisés
      {
        $this->videTableEleveurs();
        foreach($clientsFevec as $clientFevec)
        {
          $inputs['id'] = $clientFevec->CodeClient;
          $inputs['name'] = $clientFevec->NomClient;
          $inputs['email'] = ($clientFevec->email == null) ? $inputs['name']."@nomail.af" : $clientFevec->email;
          $inputs['ede'] = ($clientFevec->NumeroEDE == null ) ? '00000000' : $clientFevec->NumeroEDE;
          $inputs['activite'] = $clientFevec->Estconventionné;

          Fev_eleveurs_n::firstOrCreate($inputs);
        }
      }
    public function videTableEleveurs()
    {
      $tableEleveurs = Fev_eleveurs_n::all();
      foreach ($tableEleveurs as $eleveur) {
        Fev_eleveurs_n::destroy($eleveur->id);
      }
    }
    public function elimineTroupeauxSansClient($troupeauxFevec) //Enlève les troupeaux qui n'ont pas de clients dans la table intermédiaire
    {
      foreach($troupeauxFevec as $troupeauFevec)
      {
        $eleveur = Fev_eleveurs_n::where('id', $troupeauFevec->CodeClient)->first();
        if(isset($eleveur->name)) {
          $troupeauxFevecAvecClient[] = $troupeauFevec;
        }
      }
      return $troupeauxFevecAvecClient;
    }
    public function remplitTableTroupeaux($troupeauxFevec) // vide puis remplit la table intermédiaire avec les troupeaux normalisé
    {
      $this->videTableTroupeaux();
      foreach ($troupeauxFevec as $troupeauFevec) {
        $inputs['id'] = $troupeauFevec->CodeTroupeau;
        $inputs['user_id'] = $troupeauFevec->CodeClient;
        $inputs['especes_id'] = $troupeauFevec->TypeTroupeau;
        $inputs['races_id'] = ($troupeauFevec->RaceDominante == null) ? null : $troupeauFevec->RaceDominante;
        $inputs['uiv'] = $troupeauFevec->uiv;
        Fev_troupeaux_n::firstOrCreate($inputs);

      }
    }
      public function videTableTroupeaux()
      {
        $tableTroupeaux = Fev_troupeaux_n::all();
        foreach($tableTroupeaux as $troupeaux)
        {
          Fev_troupeaux_n::destroy($troupeaux->id);
        }
      }

// IMPORTE LES TABLES FEVEC DANS LES TABLES LOCALES ############################
  public function importFevec()
  {
    $importFevec = [];
    // IMPORT ELEVEURS
    $usersAvant = $this->usersRepository->nbUser();
    $listeEleveursFevec = $this->listeEleveurs();
    foreach ($listeEleveursFevec as $eleveurFevec) {
      $this->creeEleveurLocal($eleveurFevec);
    }
    $usersApres = $this->usersRepository->nbUser();
    $nbUsersAjoutes = $usersApres - $usersAvant;
    // IMPORT TROUPEAUX
    $listeTroupeauxFevec = $this->listeTroupeaux();
    foreach ($listeTroupeauxFevec as $troupeauFevec) {
      $this->creeTroupeauLocal($troupeauFevec);
    }
   //SUPPRESSION D'ELEVEURS
    $listeASupprimer = $this->usersRepository->proposeSupprimerEleveur($listeEleveursFevec); // Supprime de la bdd les éleveurs qui ne sont plus dans la bdd FEVEC;
    $IdASupprimer = [];
    foreach ($listeASupprimer as $suppr) {
      $IdASupprimer[] = $suppr->id;
    }
    $listeIdASupprimer = implode(",", $IdASupprimer);

    $importFevec['listeASupprimer'] = $listeASupprimer;
    $importFevec['listeIdASupprimer'] = $listeIdASupprimer;
    $importFevec['nbUsersAjoutes'] = $nbUsersAjoutes;

    return $importFevec;
  }
  // SOUS-METHODES POUR IMPORTFEVEC
    public function creeEleveurLocal($eleveurFevec)
    {
      $inputs['id'] = $eleveurFevec->id;
      $inputs['name'] = $eleveurFevec->name;
      $inputs['ede'] = $eleveurFevec->ede;
      $inputs['email'] = $eleveurFevec->email;
      $inputs['activite_id'] = $eleveurFevec->activite;
      $inputs['password'] = bcrypt($eleveurFevec->ede);
      User::updateOrCreate(['id' => $eleveurFevec->id], $inputs);
    }
    public function creeTroupeauLocal($troupeauFevec)
    {
      $inputs['id'] = $troupeauFevec->id;
      $inputs['user_id'] = $troupeauFevec->user_id;
      $inputs['especes_id'] = $troupeauFevec->especes_id;
      $inputs['races_id'] = $troupeauFevec->races_id;
      $inputs['uiv'] = $troupeauFevec->uiv;
      Troupeau::updateOrCreate(['id' => $troupeauFevec->id], $inputs);
    }

// VERIFIER LES TROUPEAUX ######################################################
  public function verifieTroupeaux()
  {
    $actions['suppression']['titre'] = 'troupeaux supprimés';
    $actions['suppression']['troupeaux'] = $this->suppressionTroupeaux();
    $actions['suppression']['icone'] = 'troupeaux_supprimes.svg';

    $actions['ajout']['titre'] = 'troupeaux ajoutés';
    $actions['ajout']['troupeaux'] = $this->ajoutTroupeaux();
    $actions['ajout']['icone'] = 'troupeaux_ajoutes.svg';

    $actions['modification']['titre'] = 'troupeaux modifés';
    $actions['modification']['troupeaux'] = $this->comparerTroupeaux();
    $actions['modification']['icone'] = 'troupeaux_modifies.svg';

    return $actions;
  }
  // SOUS-METHODES DE LA METHODE VERIFIE TROUPEAUX
    public function suppressionTroupeaux()
    {
      $idTroupeauxDifferents = $this->compareIdTpLocalVsTpFevec();
      $eleveursDesTroupeauxASupprimer = $this->listeEleveursDesTroupeauxASupprimer($idTroupeauxDifferents);
      return $eleveursDesTroupeauxASupprimer;
    }
      public function compareIdTpLocalVsTpFevec()
      {
        return array_diff($this->idTroupeauxLocal(), $this->idTroupeauxFevec());
      }
      public function listeEleveursDesTroupeauxASupprimer($idTroupeauxDifferents)
      {
        $eleveursDesTroupeauxASupprimer = [];
        if(!empty($idTroupeauxDifferents))
        {
          foreach ($idTroupeauxDifferents as $idTroupeauDifferent) {
            $troupeauDifferent = Troupeau::find($idTroupeauDifferent);
            $eleveurDifferent =  User::find($troupeauDifferent->user_id);
            $eleveursDesTroupeauxASupprimer[] = $eleveurDifferent;
            Troupeau::where('id', $troupeauDifferent->id)->delete();
          }
        }
        return $eleveursDesTroupeauxASupprimer;
      }

    public function ajoutTroupeaux()
    {
      $idTroupeauxDifferents = $this->compareIdTpFevecVsTpLocal();
      $eleveursDesTroupeauxAAjouter = $this->listeEleveursDesTroupeauxAAjouter($idTroupeauxDifferents);
      return $eleveursDesTroupeauxAAjouter;
    }
      public function compareIdTpFevecVsTpLocal()
      {
        return array_diff($this->idTroupeauxFevec(), $this->idTroupeauxLocal());
      }
      public function idTroupeauxFevec()
      {
        foreach (Fev_troupeaux_n::all() as $troupeauFevec) {
          $listeIdTroupeauxFevec[] = $troupeauFevec->id;
        }
        return $listeIdTroupeauxFevec;
      }
      public function idTroupeauxLocal()
      {
        foreach (Troupeau::all() as $troupeauLocal) {
          $listeIdTroupeauxLocal[] = $troupeauLocal->id;
        }
        return $listeIdTroupeauxLocal;
      }
      public function listeEleveursDesTroupeauxAAjouter($idTroupeauxDifferents)
      {
        $eleveursDesTroupeauxAAjouter = [];
        if(!empty($idTroupeauxDifferents))
        {
          foreach ($idTroupeauxDifferents as $idTroupeauDifferent) {
            $troupeauDifferent = Fev_troupeaux_n::find($idTroupeauDifferent);
            $eleveurDifferent =  Fev_eleveurs_n::find($troupeauDifferent->user_id);
            $eleveursDesTroupeauxAAjouter[] = $eleveurDifferent;
            $this->creeTroupeauLocal($troupeauDifferent);
          }
        }
        return $eleveursDesTroupeauxAAjouter;
      }

    public function comparerTroupeaux()
    {
      $eleveurTroupeauxModifies = [];
      $listeIdTroupeauxFevec = $this->idTroupeauxFevec();
      $eleveursTroupeauxModifies = $this->chercheTroupeauxDifferents($listeIdTroupeauxFevec);
      return $eleveursTroupeauxModifies;
    }
      public function chercheTroupeauxDifferents($listeIdTroupeauxFevec)
      {
        $eleveursTroupeauxModifies = [];
        foreach ($listeIdTroupeauxFevec as $idTroupeauFevec) {
          $troupeauLocal = Troupeau::find($idTroupeauFevec);
          $troupeauFevec = Fev_troupeaux_n::find($idTroupeauFevec);
          if(isset($troupeauLocal)){
            if($troupeauLocal->user_id != $troupeauFevec->user_id) {
                echo "le troupeau n°$idTroupeauFevec n'a pas le même éleveur";
                
            }
            elseif($troupeauLocal->especes_id != $troupeauFevec->especes_id)
            {
              $this->miseAJourTroupeau($troupeauFevec->id, 'especes_id', $troupeauFevec->especes_id);
              $eleveursTroupeauxModifies[] = User::where('id', $troupeauLocal->user_id)->first();
            }
            elseif($troupeauLocal->races_id != $troupeauFevec->races_id){
               $this->miseAJourTroupeau($troupeauFevec->id, 'races_id', $troupeauFevec->races_id);
               $eleveursTroupeauxModifies[] = User::where('id', $troupeauLocal->user_id)->first();
            }
            elseif($troupeauLocal->uiv != $troupeauFevec->uiv){
              $this->miseAJourTroupeau($troupeauFevec->id, 'uiv', $troupeauFevec->uiv);
              $eleveursTroupeauxModifies[] = User::where('id', $troupeauLocal->user_id)->first();
            }
          }
        }
        return $eleveursTroupeauxModifies;
      }
        public function miseAJourTroupeau($id, $parametre, $valeurParametre)
        {
          Troupeau::where('id', $id)->update([$parametre => $valeurParametre ]);
        }

// METHODES CONCERNANT LES STATISTIQUES ########################################
  public function calculStatEleveursTroupeaux()
  {
    $stat = [];
    // $stat['total'] = $this->statTotal();
    // $stat['eleveurs'] = $this->statEleveurs();
    $stat = $this->statEleveurs();
    return $stat;
  }
  public function statTotal()
  {
    $nbClients = Fev_clients::count();
    $stats['nbClients'] = $nbClients;
    return $stats;
  }
  public function statEleveurs()
  {
    //$stats = [][];
    // $stats['nombre d\'éleveurs'] = User::count();
    $convSuiv = Graphiques::creeGraph('donut', "types d'éleveurs", StatFactory::convSuiv());
    $nbTpDiff = Graphiques::creeGraph('donut', "espèces (nombre de troupeaux)", StatFactory::nbTpDiff());
    $uivParEsp = Graphiques::creeGraph('donut', "especes (nombre d'UIV)", StatFactory::uivParEsp());
    $stats['graph'][] = $convSuiv;
    $stats['graph'][] = $nbTpDiff;
    $stats['graph'][] = $uivParEsp;
    return $stats;
  }
}
