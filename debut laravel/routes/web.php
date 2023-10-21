<?php



use Illuminate\Support\Facades\Route;
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

Route::get('/',\App\Http\Controllers\AdminController::class . '@index');

Route::post('/log_admin',\App\Http\Controllers\AdminController::class . '@log_admin');

Route::post('/publier',\App\Http\Controllers\AdminController::class . '@ajouter_candidat');

Route::get('/voir_dossier/{idannonce}',\App\Http\Controllers\AdminController::class . '@voirDossier');


//postuler un candidat
Route::get('/postuler/{idcandidat}/{idannonce}',App\Http\Controllers\AdminController::class . '@postuler');


Route::post('/saisie_note',\App\Http\Controllers\CandidatController::class . '@index');

// Envoi de l'email vers le candidat
Route::get('/log_candidat/{idcandidat}/{idannonce}',App\Http\Controllers\CandidatController::class . '@log_candidat');

Route::post('/test_cand',App\Http\Controllers\CandidatController::class . '@test_cand');

// Envoi de l'email vers le candidat
Route::get('/eval_test/{idcandidat}/{idannonce}',App\Http\Controllers\AdminController::class . '@eval_test');

// Reponse du test
Route::get('/corriger_test/{idcandidat}/{idannonce}',App\Http\Controllers\AdminController::class . '@corriger_test');


Route::post('/eval_note_test',App\Http\Controllers\AdminController::class . '@eval_note_test');

Route::get('/eval_entretien/{idcandidat}/{idannonce}',App\Http\Controllers\CandidatController::class . '@eval_entretien');

Route::post('/eval_note_entretien',App\Http\Controllers\CandidatController::class . '@eval_note_entretien');

Route::get('/eval_embauche/{idannonce}',App\Http\Controllers\CandidatController::class . '@eval_embauche');

// Liste des candidats
Route::get('/liste_cand/{idannonce}',App\Http\Controllers\CandidatController::class . '@liste_cand');

// Candidat a noter
Route::get('/ajout_note/{idcandidat}/{idannonce}',App\Http\Controllers\CandidatController::class . '@ajout_note');

// Ajouter un candidat
Route::post('/ajoutc',App\Http\Controllers\CandidatController::class . '@ajoutc');


// Retour vers la liste des annonces
Route::get('/retour_annonce',App\Http\Controllers\AdminController::class . '@retour_annonce');


// Bouton retour
Route::get('/retour/{idannonce}',App\Http\Controllers\AdminController::class . '@retour');

//conger
Route::get('/conger',App\Http\Controllers\CongerController::class . '@index');

//trait conger
Route::post('/trait_conger',App\Http\Controllers\CongerController::class . '@trait_conger');

//page organigramme
Route::get('/ornigramme',App\Http\Controllers\CongerController::class . '@ornigramme');

//voir organigramme d'un département
Route::get('/org_depart/{id}',App\Http\Controllers\CongerController::class . '@org_depart');

//sendVue
Route::get('/sendVue',App\Http\Controllers\AdminController::class . '@sendVue');

// Liste des embauches
Route::get('/liste_embauche/{idannonce}',App\Http\Controllers\CandidatController::class . '@liste_embauche');

// Atribuer poste
Route::get('/a_poste/{idcandidat}/{idannonce}',App\Http\Controllers\CandidatController::class . '@a_poste');

// Inserer un nouvel employe
Route::post('/insert_employe',App\Http\Controllers\CandidatController::class . '@insert_employe');

//Contrat de travail
Route::POST('/contrat_travail',App\Http\Controllers\CandidatController::class . '@contrat_travail');


// Retour liste embauche
Route::get('/retour_listeembauche/{idannonce}',App\Http\Controllers\CandidatController::class . '@retour_listeembauche');

// Retour formulaire d'emploiement
Route::get('/retour_a_poste/{idcandidat}/{idannonce}',App\Http\Controllers\CandidatController::class . '@retour_a_poste');

// INSERT CONTRAT CDI
Route::get('/insert_CDI/{idemploye}/',App\Http\Controllers\CandidatController::class . '@insert_CDI');


// INSERT CONTRAT CDD
Route::POST('/insert_CDD',App\Http\Controllers\CandidatController::class . '@insert_CDD');

// Insert CE
Route::post('/insert_CE',App\Http\Controllers\CandidatController::class . '@insert_CE');

// Miditra CNaPS
Route::post('/alefa_cnaps',App\Http\Controllers\CandidatController::class . '@alefa_cnaps');


// INSERT CONTRAT CDI
Route::get('/org1',App\Http\Controllers\CandidatController::class . '@org1');


// INSERT CONTRAT CDI
Route::get('/org2',App\Http\Controllers\CandidatController::class . '@org2');


// INSERT CONTRAT CDI
Route::get('/org3',App\Http\Controllers\CandidatController::class . '@org3');

//retour liste embauche
Route::get('/retour_listeembauche',App\Http\Controllers\CandidatController::class . '@retour_listeembauche');


// Miditra CNaPS
Route::post('/insert_SME',App\Http\Controllers\CandidatController::class . '@insert_SME');

// PAYEMENT SALAIRES

// Liste des employes pour la liste des payes
Route::get('/voir_emp',App\Http\Controllers\EmployeController::class . '@voir_emp');

// Fiche individuelle de paye
Route::get('/fiche_salaire',App\Http\Controllers\EmployeController::class . '@ficheSalaire');

// exporter salaire employe
Route::get('/exporter',App\Http\Controllers\EmployeController::class . '@exporterSalaire');

// voir etat de paie
Route::get('/voir_etat_de_paie',App\Http\Controllers\EmployeController::class . '@voir_etat_paie');

Route::get('/recherchePaie',App\Http\Controllers\EmployeController::class . '@recherchePaie');

Route::get('/historique',App\Http\Controllers\EmployeController::class . '@historique');

Route::get('/detail_emp/{id}/',App\Http\Controllers\EmployeController::class . '@detail_emp');

Route::post('/voir_detail_emp',App\Http\Controllers\EmployeController::class . '@voir_detail_emp');

Route::get('/pointage',App\Http\Controllers\EmployeController::class . '@pointage');

Route::post('/ajout_pointage',App\Http\Controllers\EmployeController::class . '@ajout_pointage');
