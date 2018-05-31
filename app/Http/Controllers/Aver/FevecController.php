<?php

namespace App\Http\Controllers\Aver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\FevecRepository;
use App\Repositories\UsersRepository;
use App\Repositories\TroupeauxRepository;
use App\Repositories\FevecSousmenuRepository;
use App\Repositories\Fevec\ParamGestion;
use App\Repositories\Fevec\MajVetSan;
//use App\User;
//use App\Troupeau;
use App\Outils\ArrangeCsv;
//use App\Outils\Graphiques;

class FevecController extends Controller
{


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
      return view('fevec\accueil', ['stats' => $stats ]);
    }

    public function gestion()
    {
      $tableSommaire = ArrangeCsv::organise('menuGestionFevec');
      $listeMenu = FevecSousmenuRepository::sousmenuGestion();
      return view('fevec\sommaireFevec', [
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
        return redirect()->route('fevec.index');
    }

    public function normalise() // Nettoie les tables fevec et crée deux tables intermédiaires
    {
      $this->fevecRepository->fevecNormalise();
      $listeMenu = FevecSousmenuRepository::sousmenuNormalise();
      return view('fevec\etatNormalise', [
        'menu' => $listeMenu,
      ]);
    }

    public function importFevec()
    {
      $importFevec = $this->fevecRepository->importFevec();

      if(empty($importFevec['listeASupprimer']))
      {
        $listeMenu = FevecSousmenuRepository::rienASupprimer();

        return view('fevec\rienASupprimer', [
          'nbUsersAjoutes' => $importFevec['nbUsersAjoutes'],
          'menu' => $listeMenu,
        ]);
      } else {
        return view('fevec\listeASupprimer', [
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
      return view('fevec\listeEleveursFevec', [
        'listeEleveurs' => $listeFevecAver['eleveurs'],
        'listeTroupeaux' => $listeFevecAver['troupeaux'],
        'detail_troupeau' => $listeFevecAver['detail'],
      ]);
    }
    
    public function paramImport()
    {
        $params = ParamGestion::creeListeParam();
        $listeMenu = FevecSousmenuRepository::paramImport();
        return view('fevec\paramImport', [
            'params' => $params,
            'menu' => $listeMenu
        ]);
    }
    
    public function majParam(Request $request)
    {
        ParamGestion::ecritParam($request->all());
        return redirect()->route('fevec.gestion')->with('status', 'Les paramètres ont été mis à jour');
    }
    
    public function majVetSan()
    {
        MajVetSan::majVetsan();
    }

}
