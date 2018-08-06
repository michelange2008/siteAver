<?php

namespace App\Http\Controllers\Aver\Admin\Fevec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Repositories\Fevec\FevecRepository;
use App\Repositories\UsersRepository;
use App\Repositories\TroupeauxRepository;
use App\Repositories\Fevec\FevecSousmenuRepository;
use App\Repositories\Fevec\ParamGestion;
use App\Outils\MajDateMajFevec;

use App\Traits\RenommeBddAver;
use App\Factories\GestionFevec\ListeGestionFevec;
    
class FevecController extends Controller
{
    use RenommeBddAver;

  protected $fevecRepository;
  protected $userRepository;
  protected $troupeauxRepository;
  

    public function __construct(FevecRepository $fevecRepository ,UsersRepository $userRepository, TroupeauxRepository $troupeauxRepository)
    {
      $this->fevecRepository = $fevecRepository;
      $this->userRepository = $userRepository;
      $this->troupeauxRepository = $troupeauxRepository;
    }

    public function index()
    {
      $stats = $this->fevecRepository->calculStatEleveursTroupeaux();
      return view('fevec/accueil', [
          'stats' => $stats,
          'dernMaJ' => MajDateMajFevec::dernMaJEnMois(),
           ]);
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
        MajDateMajFevec::dateMaJ();
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
      } else {
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
    
    public function videTables() 
    {
        DB::table('fev_clients')->truncate();
        DB::table('fev_racedominante')->truncate();
        DB::table('fev_troupeaux')->truncate();
        DB::table('fev_typeactivite')->truncate();
        DB::table('fev_typetroupeaux')->truncate();
        
        $this->renommeBddAver("essai.sql");
        $this->litBddAver('aver_mdb_modifie.sql');

        return redirect()->back();
    }
    
    
    
}
