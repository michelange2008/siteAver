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

Route::get('/', 'MainController@index');

Route::get('/phyto', 'MainController@phytotherapie');

Route::get('/plantes_libres', 'MainController@plantes_libres');

Route::get('/aver', 'HomeController@index');

Route::get('/antikor', 'Antikor\AntikorController@index');

Route::get('/forum', 'MainController@forum');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('aver/troupeau', 'Aver\TroupeauxController');

Route::resource('aver/user', 'Aver\UserController');

Route::get('/aver/admin', ['uses' => 'Aver\UserController@admin', 'as' => 'user.admin']);

Route::get('/aver/visites/accueil', ['uses' => 'Visites\VisitesController@index', 'as' => 'visites.accueil']);

//############################ Vétérinaire sanitaire ########################################################

    // AFFICHE LA PAGE AVEC LE FORMULAIRE PERMETTANT DE MODIFIER VET SAN OU NON
    Route::get('/aver/visites/vetsan/changer', ['uses' => 'Visites\VetsanController@changerVetsan', 'as' => 'vetsan.changer' ]);
    // MET LA VALEUR VRAI POUR VET SAN A TOUS LES ELEVEURS DE L AVER
    Route::post('/aver/visites/vetsan/modifier', ['uses' => 'Visites\VetsanController@modifVetsan', 'as' => 'vetsan.modifier']);
    // MET A JOUR LA COLONNE VETSAN DE LA TABLE USER APRES MODIFICATION VET SAN
    Route::get('aver/visites/vetsan/majVetsan', ['uses' => 'Visites\VetsanController@conventionVetsan', 'as' => 'vetsan.majVetsan']);

//###################### PROPHYLAXIES ##########################################################################

    // AFFICHE LE FORMULAIRE GENERAL POUR MODIFIER LA PROPHYLAXIE
    Route::get('/aver/visites/prophylo/sommaire', ['uses' => 'Visites\ProphyloController@index', 'as' => 'prophylo.index' ]);

    Route::get('/aver/visites/prophylo/changer/{espece}', ['uses' => 'Visites\ProphyloController@changerProphylo', 'as' => 'prophylo.changer' ]);

    Route::post('/aver/visites/prophylo/changer/', ['uses' => 'Visites\ProphyloController@modifProphylo', 'as' => 'prophylo.modif' ]);
    
    Route::get('aver/prophylo/remplitAnneeEnCours', ['uses' => 'Visites\ProphyloController@remplitVAencours', 'as' => 'prophylo.remplit']);

    Route::get('/aver/visites/prophylo/majProphyloBovines', ['uses' => 'Visites\ProphyloController@majProphyloBovines', 'as' => 'prophylo.majProphyloBovines' ]);

//################################# BSA #############################################################

    Route::get('aver/visites/bsa', ['uses' => 'Visites\BsaController@index', 'as' => 'bsa.index']);

    Route::post('aver/visites/bsa/changer', ['uses' => 'Visites\BsaController@modif', 'as' => 'bsa.modif']);

//################################# VSO #############################################################

    Route::get('aver/visites/vso', ['uses' => 'Visites\VsoController@index', 'as' => 'vso.index']);

    Route::post('aver/visites/vso/changer', ['uses' => 'Visites\VsoController@modif', 'as' => 'vso.modif']);

//################################# FEVEC #############################################################
    
    /* ROUTES CONCERNANT LA GESTION DES ELEVEURS FEVEC: NORMALISATION, IMPORT ET MISE A JOUR */

Route::get('aver/fevec/accueil', ['uses' => 'Fevec\FevecController@index', 'as' => 'fevec.index']);

Route::get('aver/fevec/gestion/maj', ['uses' => 'Fevec\FevecController@toutMettreAJour', 'as' => 'fevec.maj']);

Route::get('aver/fevec/gestion', ['uses' => 'Fevec\FevecController@gestion', 'as' => 'fevec.gestion']);

Route::get('aver/fevec/gestion/normalise', ['uses' => 'Fevec\FevecController@normalise', 'as' => 'fevec.normalise']);

Route::get('aver/fevec/gestion/importFevec', ['uses' => 'Fevec\FevecController@importFevec', 'as' => 'fevec.import']);

Route::get('aver/fevec/gestion/verifieTroupeaux', ['uses' => 'Fevec\FevecController@verifieTroupeaux', 'as'=> 'fevec.verifieTroupeaux']);

Route::get('aver/fevec/listeFevecAver', ['uses' => 'Fevec\FevecController@listeFevecAver', 'as' => 'fevec.liste']);

Route::get('aver/fevec/parametreImport', ['uses' => 'Fevec\FevecController@paramImport', 'as' => 'fevec.param']);

Route::post('aver/fevec/majParam', ['uses' => 'Fevec\FevecController@majParam', 'as' => 'fevec.majParam']);



Route::get('/aver/supprimerEleveur/{id}', ['uses' => 'Aver\UserController@supprimerEleveur', 'as' => 'user.supprimerEleveur']);

Route::get('/aver/toutSupprimer/{listeId}', ['uses' => 'Aver\UserController@toutSupprimer', 'as' => 'user.toutSupprimer']);

