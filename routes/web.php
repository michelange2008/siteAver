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
// AFFICHE LA PAGE AVEC LE FORMULAIRE PERMETTANT DE MODIFIER VET SAN OU NON
Route::get('/aver/user/visite/vetsan', ['uses' => 'Aver\VisiteController@changerVetsan', 'as' => 'visite.changerVetsan' ]);
// MET LA VALEUR VRAI POUR VET SAN A TOUS LES ELEVEURS DE L AVER
Route::post('/aver/user/visite/modifvetsan', ['uses' => 'Aver\VisiteController@modifVetsan', 'as' => 'visite.modifvetsan']);
// MET A JOUR LA COLONNE VETSAN DE LA TABLE USER APRES MODIFICATION VET SAN
Route::get('aver/fevec/majVetsan', ['uses' => 'Aver\VisiteController@majVetsan', 'as' => 'visite.majVetsan']);
// AFFICHE LE FORMULAIRE GENERAL POUR MODIFIER LA PROPHYLAXIE
Route::get('/aver/user/visite/prophylo/changer/tous', ['uses' => 'Aver\VisiteController@changerProphylo', 'as' => 'visite.changerProphylo' ]);

Route::get('/aver/user/visite/prophylo/changer/bovins', ['uses' => 'Aver\VisiteController@changerProphyloBv', 'as' => 'visite.changerProphyloBv' ]);

Route::post('/aver/user/visite/prophylo/changer/modifbovins', ['uses' => 'Aver\VisiteController@modifProphyloBv', 'as' => 'visite.modifProphyloBv' ]);

Route::get('/aver/user/visite/prophylo/changer/petitsrum', ['uses' => 'Aver\VisiteController@changerProphyloPr', 'as' => 'visite.changerProphyloPr' ]);

Route::get('/aver/user/visite/prophylo/changer/autres', ['uses' => 'Aver\VisiteController@changerProphyloAutres', 'as' => 'visite.changerProphyloAutres' ]);

Route::get('/aver/user/visite/majProphylo', ['uses' => 'Aver\VisiteController@majProphylo', 'as' => 'visite.majProphylo' ]);

/* ROUTES CONCERNANT LA GESTION DES ELEVEURS FEVEC: NORMALISATION, IMPORT ET MISE A JOUR */

Route::get('aver/fevec/accueil', ['uses' => 'Aver\FevecController@index', 'as' => 'fevec.index']);

Route::get('aver/fevec/gestion/maj', ['uses' => 'Aver\FevecController@toutMettreAJour', 'as' => 'fevec.maj']);

Route::get('aver/fevec/gestion', ['uses' => 'Aver\FevecController@gestion', 'as' => 'fevec.gestion']);

Route::get('aver/fevec/gestion/normalise', ['uses' => 'Aver\FevecController@normalise', 'as' => 'fevec.normalise']);

Route::get('aver/fevec/gestion/importFevec', ['uses' => 'Aver\FevecController@importFevec', 'as' => 'fevec.import']);

Route::get('aver/fevec/gestion/verifieTroupeaux', ['uses' => 'Aver\FevecController@verifieTroupeaux', 'as'=> 'fevec.verifieTroupeaux']);

Route::get('aver/fevec/listeFevecAver', ['uses' => 'Aver\FevecController@listeFevecAver', 'as' => 'fevec.liste']);

Route::get('aver/fevec/parametreImport', ['uses' => 'Aver\FevecController@paramImport', 'as' => 'fevec.param']);

Route::post('aver/fevec/majParam', ['uses' => 'Aver\FevecController@majParam', 'as' => 'fevec.majParam']);



Route::get('/aver/supprimerEleveur/{id}', ['uses' => 'Aver\UserController@supprimerEleveur', 'as' => 'user.supprimerEleveur']);

Route::get('/aver/toutSupprimer/{listeId}', ['uses' => 'Aver\UserController@toutSupprimer', 'as' => 'user.toutSupprimer']);

