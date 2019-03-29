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
Route::get('/formInteraction/{id_medicament}','InteractionController@getInteraction');

//Supprimer un Medicament
Route::get('/supprimeMedicament/{NUMART}', 'MedicamentController@supprimeMedicament');

//Formulaire pour ajouter un Medicament
Route::get('/ajouterMedicament/', 'ArticleController@addArticle');

//Formulaire pour modifier un Medicament
Route::get('/modifierMedicament/{NUMART}', 'ArticleController@updateArticle');

//Enregistrer une modification d'un Medicament
Route::post('/validerMedicament', 'FraisController@validateArticle');