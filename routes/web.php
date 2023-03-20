<?php
use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuteurController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
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

Route::get('/', [AbonneController::class, 'Accueil']);
Route::get('/inscription', [AbonneController::class, 'inscription']);
Route::get('/authentification', [AbonneController::class, 'connexion']);
ROute::get('/nouveau_mot_de_passe', [AbonneController::class, 'mot_de_passe']);
Route::post('/creer_utilisateur', [AbonneController::class, 'creer_utilisateur']);
Route::post('/connexion', [AbonneController::class, 'authentification']);
Route::get('/Dashboard', [AbonneController::class, 'Dashboard']);
Route::get('/deconnexion', [AbonneController::class, 'deconnexion']);
Route::get('/details/{id}', [AbonneController::class, 'detail_livre']);
Route::get('lire_ouvrage/{id}', [AbonneController::class, 'lecture_ouvrage']);
Route::get('/emprunts', [AbonneController::class, 'getEmprunt']);
Route::post('/ajout_emprunt', [AbonneController::class, 'sauver_emprunt']);
Route::get('/rendre/{id}', [AbonneController::class, 'ramener_ouvrage']);
Route::get('/emprunts/Encours', [AbonneController::class, 'getEmpruntEncours']);
Route::get('/emprunts/Termine', [AbonneController::class, 'getEmpruntTermine']);

// ***************Admin route***********
Route::get('/ajouter_ouvrage', [AdminController::class, 'ouvrage_form']);
Route::post('/ajout_ouvrage', [AdminController::class, 'sauver_ouvrage']);
Route::get('/ajouter_specialite', [AdminController::class, 'specialite_form']);
Route::post('/ajout_specialite', [AdminController::class, 'sauver_specialite']);
Route::get('/supprimer_specialite/{id}', [AdminController::class, 'Supprimer_specialite']);
Route::get('/ajouter_categorie', [AdminController::class, 'categorie_form']);
Route::get('/supprimer_categorie/{id}', [AdminController::class, 'Supprimer_categorie']);
Route::post('/ajout_categorie', [AdminController::class, 'sauver_categorie']);
Route::get('/ajouter_utilisateur', [AdminController::class, 'utilisateur_form']);
Route::post('/ajout_utilisateur', [AdminController::class, 'sauver_utilisateur']);
Route::get('/ouvrages', [AdminController::class, 'getOuvrages']);
Route::get('/categories', [AdminController::class, 'getCategories']);
Route::get('/specialites', [AdminController::class, 'getSpecialites']);
Route::get('/abonnes', [AdminController::class, 'getAbonne']);
Route::get('/auteurs', [AdminController::class, 'getAuteur']);
Route::get('/selection_par_categorie/{id}', [AdminController::class, 'selectionner_par_catégorie']);
Route::get('/bloquer_utilisateur/{id}',[AdminController::class, 'Bloquer_abonne']);
Route::get('activer_abonne/{id}', [AdminController::class, 'Activer_compte']);
Route::get('/bloquer_compte/{id}',[AdminController::class, 'Bloquer_compte']);
Route::get('/supprimer_compte/{id}',[AdminController::class, 'Supprimer_compte']);
Route::get('/ouvrages', [AdminController::class, 'getOuvrages']);
Route::get('/desactiver_ouvrage/{id}', [AdminController::class, 'desactiverOuvrage']);
Route::get('/activer_ouvrage/{id}', [AdminController::class, 'activerOuvrage']);
// *********auteur route*********
Route::get('/auteur_ouvrages', [AuteurController::class, 'getOuvrages']);

// function () {
//  //factory( \App\App\Models\Comment::class, 5)->create();
//     //$comments = Comment::factory()->count(5)->create();
//     // $comment = App\Models\Comment::create(
//     //     [2,'La famine est la cause de nombreux deces en Afrique']
//     // );
//      $posts = Post::with('comments')->get();
//     //$posts = Post::find(1)->comments;
//     $comments = Comment::find(1);
//     return view('welcome',['posts'=>$posts, 'comments1'=>$comments]);
// });

// Route::get('/manyTomany', function(){
//     $post = Post::all();
//     return view('welcome', ['tags'=>$post]);
// });

// Route::get('/acc', function(){
//     return view('accueil');
// });
