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

Route::get('aver/troupeau/analyses/{id?}', ['uses' => 'Aver\Fichiers\Analyses\AnalysesController@index', 'as' => 'troupeau.analyses']);

Route::get('/home', 'Aver\AverController@index')->name('home');

Route::resource('aver/troupeau', 'Aver\TroupeauxController');

Route::resource('aver/user', 'Aver\UserController');

Route::get('/aver/admin', ['uses' => 'Aver\UserController@admin', 'as' => 'user.admin']);

Route::get('/aver/visites/accueil', ['uses' => 'Aver\Visites\VisitesController@index', 'as' => 'visites.accueil']);

Route::get('/aver/troupeau/detail/{id?}' , ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@index', 'as' => 'troupeau.accueil']);

Route::get('/aver/troupeau/paramadmin/{id?}', ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@paramAdmin', 'as' => 'troupeau.paramAdmin' ]);

Route::post('aver/troupeau/paramadmin/modif',  ['uses' => 'Aver\Troupeaux\TroupeauAffichageController@paramAdminModif', 'as' => 'troupeau.paramAdmin.modif' ]);

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

//################################# VSO #############################################################

    Route::get('aver/visites/vso', ['uses' => 'Aver\Visites\VsoController@index', 'as' => 'vso.index']);

    Route::post('aver/visites/vso/changer', ['uses' => 'Aver\Visites\VsoController@modif', 'as' => 'vso.modif']);

    Route::get('aver/visites/vso/remplitBv', ['uses' => 'Aver\Visites\VsoController@remplitBv', 'as' => 'vso.bv']);

    Route::get('aver/visites/vso/remplitPr', ['uses' => 'Aver\Visites\VsoController@remplitPr', 'as' => 'vso.pr']);

//################################# FEVEC #############################################################
    
    /* ROUTES CONCERNANT LA GESTION DES ELEVEURS FEVEC: NORMALISATION, IMPORT ET MISE A JOUR */

Route::get('aver/fevec/accueil', ['uses' => 'Aver\Admin @index', 'as' => 'fevec.index']);

Route::get('aver/fevec/gestion/maj', ['uses' => 'Aver\Admin\Fevec\FevecController@toutMettreAJour', 'as' => 'fevec.maj']);

Route::get('aver/fevec/gestion', ['uses' => 'Aver\Admin\Fevec\FevecController@gestion', 'as' => 'fevec.gestion']);

Route::get('aver/fevec/gestion/normalise', ['uses' => 'Aver\Admin\Fevec\FevecController@normalise', 'as' => 'fevec.normalise']);

Route::get('aver/fevec/gestion/importFevec', ['uses' => 'Aver\Admin\Fevec\FevecController@importFevec', 'as' => 'fevec.import']);

Route::get('aver/fevec/gestion/verifieTroupeaux', ['uses' => 'Aver\Admin\Fevec\FevecController@verifieTroupeaux', 'as'=> 'fevec.verifieTroupeaux']);

Route::get('aver/fevec/listeFevecAver', ['uses' => 'Aver\Admin\Fevec\FevecController@listeFevecAver', 'as' => 'fevec.liste']);

Route::get('aver/fevec/parametreImport', ['uses' => 'Aver\Admin\Fevec\FevecController@paramImport', 'as' => 'fevec.param']);

Route::post('aver/fevec/majParam', ['uses' => 'Aver\Admin\Fevec\FevecController@majParam', 'as' => 'fevec.majParam']);



Route::get('/aver/supprimerEleveur/{id}', ['uses' => 'Aver\UserController@supprimerEleveur', 'as' => 'user.supprimerEleveur']);

Route::get('/aver/toutSupprimer/{listeId}', ['uses' => 'Aver\UserController@toutSupprimer', 'as' => 'user.toutSupprimer']);

