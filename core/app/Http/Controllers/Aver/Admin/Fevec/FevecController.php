<?php

namespace App\Http\Controllers\Aver\Admin\Fevec;

use App\Http\Controllers\Controller;
use App\Traits\FevecDateMajBdd;
use App\Repositories\TroupeauxRepository;
use App\Repositories\UsersRepository;
use App\Repositories\Fevec\FevecRepository;
use App\Repositories\Fevec\FevecSousmenuRepository;
use App\Repositories\Fevec\ParamGestion;
use Illuminate\Http\Request;

use App\Factories\GestionFevec\ListeGestionFevec;

use App\Traits\FevecRenommeBddAver;
use App\Traits\FevecTelecharge;
    
class FevecController extends Controller
{
    use FevecRenommeBddAver;
    use FevecTelecharge;
    use FevecDateMajBdd;

  protected $fevecRepository;
  protected $userRepository;
  protected $troupeauxRepository;
  

    public function __construct(FevecRepository $fevecRepository ,UsersRepository $userRepository, TroupeauxRepository $troupeauxRepository)
    {
      $this->fevecRepository = $fevecRepository;
      $this->userRepository = $userRepository;
      $this->troupeauxRepository = $troupeauxRepository;
    }

    public function gestion()
    {
      $listeMenu = FevecSousmenuRepository::sousmenuGestion();
      $tableSommaire = new ListeGestionFevec();
      return view('fevec/sommaireFevec', [
        'tableSommaire' => $tableSommaire,
        'menu' => $listeMenu
      ]);
    }

    public function toutMettreAJour()
    {
        $this->normalise();
        $resultImport = $this->fevecRepository->importFevec();
        $this->userRepository->supprimerListeEleveur($resultImport['listeIdASupprimer']);
        $this->verifieTroupeaux();
        // Inscrit la date de mise à jour
        $this->dateMaJ();
        return redirect()->route('fevec.index');
    }

    public function normalise() // Nettoie les tables fevec et crée deux tables intermédiaires
    {
      $this->fevecRepository->fevecNormalise();
      $listeMenu = FevecSousmenuRepository::sousmenuNormalise();
      return view('fevec/etatNormalise', [
        'menu' => $listeMenu,
      ]);
    }
    /* @TODO prévoir le cas où l'import n'a pas fonctionner et voudrait vider complétement la bdd USER et TROUPEAU
     * 
     */
    public function importFevec()
    {
      $importFevec = $this->fevecRepository->importFevec();

      if(empty($importFevec['listeASupprimer']))
      {
        $listeMenu = FevecSousmenuRepository::rienASupprimer();

        return view('fevec/rienASupprimer', [
          'nbUsersAjoutes' => $importFevec['nbUsersAjoutes'],
          'menu' => $listeMenu,
        ]);
      } elseif(is_array($importFevec['listeASupprimer']) && count($importFevec['listeASupprimer']) > 5) {
          flash("Attention !!! Il y a ".count($importFevec['listeASupprimer'])." d'éleveurs à supprimer")->error();
          
          $listeMenu = FevecSousmenuRepository::retour();
          
          return view('fevec.bigdelete', [
              'menu' => $listeMenu,
              'liste' => $importFevec['listeASupprimer'],
          ]);
      }
      else {
        return view('fevec/listeASupprimer', [
          'liste' => $importFevec['listeASupprimer'],
          'listeId' => $importFevec['listeIdASupprimer'],
          'nbUsersAjoutes' => $importFevec['nbUsersAjoutes'],
        ]);
      }
    }
    public function verifieTroupeaux()
    {
      $verifieTroupeaux = $this->fevecRepository->verifieTroupeaux();

      $listeMenu = FevecSousmenuRepository::verifieTroupeaux();

      return view('fevec/modificationsTroupeaux', [
        'actions' => $verifieTroupeaux,
        'menu' => $listeMenu,
      ]);
    }

    public function listeFevecAver()
    {
      $listeFevecAver = $this->fevecRepository->listeFevecAvec();
      return view('fevec/listeEleveursFevec', [
        'listeEleveurs' => $listeFevecAver['eleveurs'],
        'listeTroupeaux' => $listeFevecAver['troupeaux'],
        'detail_troupeau' => $listeFevecAver['detail'],
      ]);
    }
    
    public function paramImport()
    {
        $params = ParamGestion::creeListeParam();
        $listeMenu = FevecSousmenuRepository::paramImport();
        return view('fevec/paramImport', [
            'params' => $params,
            'menu' => $listeMenu
        ]);
    }
    
    public function majParam(Request $request)
    {
        ParamGestion::ecritParam($request->all());
        return redirect()->route('fevec.gestion')->with('status', 'Les paramètres ont été mis à jour');
    }
    
    /*
     * Fournit un formulaire pour télécharge le fichier sql qui a été exporté du logiciel FEVEC
     */
    public function telecharge() 
    {
        return view('fevec.telecharge')->with('status', "ça va");
    }

    /*
     * Récupère le fichier, le met dans le répertoire bdd et le renomme
     */
    public function postTelecharge(Request $request)
    {
        $this->telecharge_fichier($request);
        
        return redirect()->back()->with('info', 'telecharge'); 
    }
    
    /* Vide toutes les tables fevec intermédiaires en utilisant la liste d'en-têtes modifiés
     * 
     */
    public function videTables()
    {
        $this->videTables_fev();

        return redirect()->back()->with('info', 'vide');
    }

    /* Renomme les entetes du fichier sql importé puis insert toutes les lignes dans les tables à préfixe fev_
     * 
     */
    public function bddAver()
    {

        $this->renommeBddAver();
        flash("Base de donnée renommée")->success();
        $this->litBddAver();

        return redirect()->back()->with('info', 'import');
    }
    
    
    
}
