<?php


Route::get('/', function () {
    return view('home');
});

Route::get('/getLogin', function () {
    return view('connexion');
});

Route::post('/login', 'CommercialController@login');
Route::get('/logout', 'CommercialController@logout');

Route::get('/getListeMedicaments', 'MedicamentController@getMedicaments');



Route::get('/getErrors/{retour}', ['as' => '/getErrors', 'uses' => 'ErrorsController@getErreurs']);

//Afficher un Medicament
Route::get('/formMedicament/{id_medicament}','MedicamentController@getUnMedicament');

//Supprimer une interaction
Route::get('/supprimeMedicament/{id_medicament}/{med_id_medicament}', 'MedicamentController@supprimeMedicament');

//Formulaire pour ajouter un Medicament
Route::get('/ajouterInteraction', 'InteractionController@addInteraction');

//Formulaire pour modifier un Medicament
Route::get('/modifierInteraction/{id_medicament}/{med_id_medicament}', 'InteractionController@updateInteraction');

//Formulaire pour afficher les interactions
Route::get('/listerInteraction/{id_medicament}', 'InteractionController@getInteraction');

//Enregistrer une modification d'un Medicament
Route::post('/validerInteraction', 'interactionController@validateInteraction');