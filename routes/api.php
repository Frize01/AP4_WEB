<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//restaurants 
//GET
Route::get('/restaurants', [RestaurantController::class, "listeRestaurant"]);
Route::get('/restaurant/{id}', [RestaurantController::class, "RestaurantInfo"]);
Route::get('/restaurant/{id}/recettes/', [RestaurantController::class, "RecetteDansRestaurant"]);
Route::get('/restaurant/staff/{id}', [RestaurantController::class, "StaffRestaurant"]);
//POST
Route::put('/restaurant/Change/', [RestaurantController::class, "ChangeRestaurant"]);

//Recette
//GET
Route::get('/recette/categories', [RecetteController::class, "listeCategorie"]);
Route::get('/recettes', [RecetteController::class, "listeRecette"]);
Route::get('/recette/{id}', [RecetteController::class, "infoRecette"]);
Route::get('/recette/{id}/ingrediants', [RecetteController::class, "listeIngrediant"]);
Route::get('/recette/{id}/allergenes', [RecetteController::class, "listeAllergene"]);
Route::get('/recette/{id}/categories', [RecetteController::class, "listeCategorieRecette"]);
Route::get('/recette/restaurant/{id}', [RecetteController::class, "listeRecetteRestaurant"]);
//POST
Route::post('/recette/New/', [RecetteController::class, "ajoutRecette"]);
//PUT
Route::put('/recette/Change/', [RecetteController::class, "MajRecette"]);
//DELETE
Route::delete('/recette/Delete/', [RecetteController::class, "delRecette"]);

//Client
//GET
Route::get('/clients/', [UserController::class, "listeUsers"]);
Route::get('/client/{idClient}', [UserController::class, "UsersInfo"]);
Route::get('/client/{idClient}/favori', [UserController::class, "listeFavori"]);
Route::get('/client/{idClient}/commandes', [UserController::class, "listeCommande"]);
Route::get('/client/{idClient}/NonPayerCommandes', [UserController::class, "listeNonPayerCommande"]);

//Commande
//POST
Route::post('/commande', [CommandeController::class, "ajouterCommande"]);

//Client
//POST
Route::post('/client/newFav/', [UserController::class, "newFavori"]);
//DELETE
Route::delete('/client/delFav/', [UserController::class, "delFavori"]);

//login
//POST
Route::post('/login/CLIENT/', [UserController::class, "loginCLIENT"]);
Route::post('/login/STAFF/', [UserController::class, "loginSTAFF"]);

//Serveur
//GET
Route::get('/serveurs/{idRestaurant}', [ServeurController::class, "listeServeur"]);
//POST
Route::post('/serveur/New/', [ServeurController::class, "ajoutServeur"]);
//PUT
Route::put('/serveur/Change/', [ServeurController::class, "MajServeur"]);
//DELETE
Route::delete('/serveur/Delete/', [ServeurController::class, "delServeur"]);

//Table
//GET
Route::get('/Tables/{idRestaurant}', [TableController::class, "listeTable"]);
//POST
Route::post('/Table/New/', [TableController::class, "ajoutTable"]);
//PUT
Route::put('/Table/Change/', [TableController::class, "MajTable"]);
//DELETE
Route::delete('/Table/Delete/', [TableController::class, "delTable"]);

// //Allergenes
// //GET
// Route::get('/Allergene/{idRestaurant}', [AllergeneController::class, "listeAllergene"]);
// //POST
// Route::post('/Allergene/New/', [AllergeneController::class, "ajoutAllergene"]);
// //PUT
// Route::put('/Allergene/Change/', [AllergeneController::class, "MajAllergene"]);
// //DELETE
// Route::delete('/Allergene/Delete/', [AllergeneController::class, "delAllergene"]);
