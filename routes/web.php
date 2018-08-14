<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ROUTES INITIALES ######################################################################################

Route::get('/', 'MainController@index');

Route::get('/phyto', 'MainController@phytotherapie');

Route::get('/plantes_libres', 'MainController@plantes_libres');

Route::get('/aver', ['uses' => 'Aver\AverController@index', 'as' => 'aver.accueil'])->middleware('delaiBSA');

Route::get('/antikor', 'Antikor\AntikorController@index');

Route::get('/forum', 'MainController@forum');

// ROUTES AVER ##############################################################################################

Auth::routes();


Route::get('/home', 'Aver\AverController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('aver/troupeau', 'Aver\TroupeauxController');
    
    Route::resource('aver/user', 'Aver\UserController');
    
    Route::get('/aver/admin', ['uses' => 'Aver\UserController@admin', 'as' => 'user.admin']);
    
    Route::get('/aver/visites/accueil', ['uses' => 'Aver\Visites\VisitesController@index', 'as' => 'visites.accueil']);
    
    //########################################## AFFICHAGE TROUPEAU PAR TROUPEAU ############################################
    
    Route::get('/aver/troupeau/detail/{id?}' , ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@index', 'as' => 'troupeau.accueil']);
    
    Route::get('/aver/troupeau/paramadmin/{id?}', ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@paramAdmin', 'as' => 'troupeau.paramAdmin' ]);
    
    Route::post('aver/troupeau/paramadmin/modif',  ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@paramAdminModif', 'as' => 'troupeau.paramAdmin.modif' ]);
    
    Route::get('aver/troupeau/analyses/{id_user?}/{id_troupeau?}', ['uses' => 'Aver\Fichiers\Analyses\AnalysesController@parEleveur', 'as' => 'troupeau.analyses']);
    
    Route::get('aver/troupeau/ordonnances/{id?}', ['uses' => 'Aver\Fichiers\Ordonnances\OrdonnancesController@index', 'as' => 'troupeau.ordonnances']);
    
    Route::get('aver/troupeau/factures/{id?}', ['uses' => 'Aver\Fichiers\Factures\FacturesController@index', 'as' => 'troupeau.factures']);
    
    Route::get('aver/troupeau/bsa/{id_user}/{id_troupeau}', ['uses' => 'Aver\Fichiers\Bsa\BsaController@index', 'as' => 'troupeau.bsa']);
    
    Route:: get('aver/analyses', ['uses' => 'Aver\Fichiers\Analyses\AnalysesController@index', 'as' => 'admin.analyses']);
    
    Route:: get('aver/analyses/majAnalyses', ['uses' => 'Aver\Fichiers\Analyses\AnalysesController@majAnalyses', 'as' => 'admin.analyses.majAnalyses']);
    
    Route:: post('aver/analyses/important', ['uses' => 'Aver\Fichiers\Analyses\AnalysesController@changeImportant', 'as' => 'admin.analyses.changeImportant' ]);
    
    //############################ Vétérinaire sanitaire ########################################################
    
        // AFFICHE LA PAGE AVEC LE FORMULAIRE PERMETTANT DE MODIFIER VET SAN OU NON
        Route::get('/aver/visites/vetsan/changer', ['uses' => 'Aver\Visites\VetsanController@changerVetsan', 'as' => 'vetsan.changer' ]);
        // MET LA VALEUR VRAI POUR VET SAN A TOUS LES ELEVEURS DE L AVER
        Route::post('/aver/visites/vetsan/modifier', ['uses' => 'Aver\Visites\VetsanController@modifVetsan', 'as' => 'vetsan.modifier']);
        // MET A JOUR LA COLONNE VETSAN DE LA TABLE USER APRES MODIFICATION VET SAN
        Route::get('aver/visites/vetsan/majVetsan', ['uses' => 'Aver\Visites\VetsanController@conventionVetsan', 'as' => 'vetsan.majVetsan']);
    
    //###################### PROPHYLAXIES ##########################################################################
    
        // AFFICHE LE FORMULAIRE GENERAL POUR MODIFIER LA PROPHYLAXIE
        Route::get('/aver/visites/prophylo/sommaire', ['uses' => 'Aver\Visites\ProphyloController@index', 'as' => 'prophylo.index' ]);
    
        Route::get('/aver/visites/prophylo/changer/{espece}', ['uses' => 'Aver\Visites\ProphyloController@changerProphylo', 'as' => 'prophylo.changer' ]);
    
        Route::post('/aver/visites/prophylo/changer/', ['uses' => 'Aver\Visites\ProphyloController@modifProphylo', 'as' => 'prophylo.modif' ]);
        
        Route::get('aver/prophylo/remplitAnneeEnCours', ['uses' => 'Aver\Visites\ProphyloController@remplitVAencours', 'as' => 'prophylo.remplit']);
    
        Route::get('/aver/visites/prophylo/majProphyloBovines', ['uses' => 'Aver\Visites\ProphyloController@majProphyloBovines', 'as' => 'prophylo.majProphyloBovines' ]);
    
    //################################# BSA #############################################################
    
        Route::get('aver/visites/bsa', ['uses' => 'Aver\Visites\BsaController@index', 'as' => 'bsa.index']);
    
        Route::post('aver/visites/bsa/changer', ['uses' => 'Aver\Visites\BsaController@modif', 'as' => 'bsa.modif']);
    
        Route::get('aver/visites/bsa/saisie', ['uses' => 'Aver\Visites\BsaController@saisie', 'as' => 'bsa.saisie']);
        
        Route::post('aver/visites/bsa/store', ['uses' => 'Aver\Visites\BsaController@store', 'as' => 'bsa.store']);
        
        Route::get('aver/visites/bsa/ps/{troupeau_id}/{bsa_id}', ['uses' => 'Aver\Visites\BsaController@ps', 'as' => 'bsa.ps']);
        
        Route::get('aver/visites/bsa/remarque/{troupeau_id}', ['uses' => 'Aver\Visites\BsaController@remarque', 'as' => 'bsa.remarque']);
        
        //################################# VSO #############################################################
    
        Route::get('aver/visites/vso', ['uses' => 'Aver\Visites\VsoController@index', 'as' => 'vso.index']);
    
        Route::post('aver/visites/vso/changer', ['uses' => 'Aver\Visites\VsoController@modif', 'as' => 'vso.modif']);
    
        Route::get('aver/visites/vso/remplitBv', ['uses' => 'Aver\Visites\VsoController@remplitBv', 'as' => 'vso.bv']);
    
        Route::get('aver/visites/vso/remplitPr', ['uses' => 'Aver\Visites\VsoController@remplitPr', 'as' => 'vso.pr']);
        
    //################################### PS ##################################################################
    
        Route::get('aver/visites/ps', ['uses' => 'Aver\Visites\PsController@index', 'as' => 'ps.index']);
    
        Route::get('aver/visites/ps/delete/{ps_id}', ['uses' => 'Aver\Visites\PsController@destroy', 'as' => 'ps.destroy']);
        
        Route::post('aver/visites/ps/modif', ['uses' => 'Aver\Visites\PsController@modif', 'as' => 'ps.modif']);
        
        Route::get('aver/visites/ps/create', ['uses' => 'Aver\Visites\PsController@create', 'as' => 'ps.create']);
        
        Route::post('aver/visites/ps/store', ['uses' => 'Aver\Visites\PsController@store', 'as' => 'ps.store']);
        
        Route::get('aver/visites/ps/affiche/{user_id}/{bsa_id}/{ps_id}', ['uses' => 'Aver\Visites\PsController@affichePsUnEleveur', 'as' => 'ps.afficheUnEleveur']);
        
        Route::get('aver/visites/ps/affiche/{ps_id}', ['uses' => 'Aver\Visites\PsController@affichePs', 'as' => 'ps.affiche']);

        
        //################################# FEVEC #############################################################
        
        /* ROUTES CONCERNANT LA GESTION DES ELEVEURS FEVEC: NORMALISATION, IMPORT ET MISE A JOUR */
    
    Route::get('aver/fevec/accueil', ['uses' => 'Aver\Admin\Fevec\FevecController@index', 'as' => 'fevec.index']);
    
    Route::get('aver/fevec/gestion/maj', ['uses' => 'Aver\Admin\Fevec\FevecController@toutMettreAJour', 'as' => 'fevec.maj']);
    
    Route::get('aver/fevec/gestion', ['uses' => 'Aver\Admin\Fevec\FevecController@gestion', 'as' => 'fevec.gestion']);
    
    Route::get('aver/fevec/gestion/normalise', ['uses' => 'Aver\Admin\Fevec\FevecController@normalise', 'as' => 'fevec.normalise']);
    
    Route::get('aver/fevec/gestion/importFevec', ['uses' => 'Aver\Admin\Fevec\FevecController@importFevec', 'as' => 'fevec.import']);
    
    Route::get('aver/fevec/gestion/verifieTroupeaux', ['uses' => 'Aver\Admin\Fevec\FevecController@verifieTroupeaux', 'as'=> 'fevec.verifieTroupeaux']);
    
    Route::get('aver/fevec/listeFevecAver', ['uses' => 'Aver\Admin\Fevec\FevecController@listeFevecAver', 'as' => 'fevec.liste']);
    
    Route::get('aver/fevec/parametreImport', ['uses' => 'Aver\Admin\Fevec\FevecController@paramImport', 'as' => 'fevec.param']);
    
    Route::post('aver/fevec/majParam', ['uses' => 'Aver\Admin\Fevec\FevecController@majParam', 'as' => 'fevec.majParam']);
    
    Route::get('aver/fevec/vide', ['uses' => 'Aver\Admin\Fevec\FevecController@videTables', 'as' => 'fevec.videTables']);
    
    
    Route::get('/aver/supprimerEleveur/{id}', ['uses' => 'Aver\UserController@supprimerEleveur', 'as' => 'user.supprimerEleveur']);
    
    Route::get('/aver/toutSupprimer/{listeId}', ['uses' => 'Aver\UserController@toutSupprimer', 'as' => 'user.toutSupprimer']);
    
    //############################################## GESTION DE L'ANCIENNE TABLE DE DONNEES BSA ############################################
    
    Route::get('aver/intermede', ['uses' => 'Aver\Admin\Intermede\IntermedeController@index', 'as' => 'intermede.index']);
    
    Route::get('aver/essai', ['uses' =>'Aver\Admin\EssaiController@index', 'as' => 'essai']);
    
    Route::post('aver/essai/ajax', ['uses' =>'Aver\Admin\EssaiController@ajax', 'as' => 'ajax']);
    
});
