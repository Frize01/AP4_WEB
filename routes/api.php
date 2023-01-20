<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecetteController;
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

//Global

//restaurants
Route::get('/restaurants', [RestaurantController::class, "listeRestaurant"]);
Route::get('/restaurant/{id}', [RestaurantController::class, "RestaurantInfo"]);
Route::get('/restaurant/{id}/recettes/', [RestaurantController::class, "RecetteDansRestaurant"]);

//Recette
Route::get('/recette/categories', [RecetteController::class, "listeCategorie"]);
Route::get('/recettes', [RecetteController::class, "listeRecette"]);
Route::get('/recette/{id}', [RecetteController::class, "infoRecette"]);
Route::get('/recette/{id}/ingrediants', [RecetteController::class, "listeIngrediant"]);
Route::get('/recette/{id}/allergenes', [RecetteController::class, "listeAllergene"]);
Route::get('/recette/{id}/categories', [RecetteController::class, "listeCategorieRecette"]);

//Client
Route::get('/clients/', [UserController::class, "listeUsers"]);
Route::get('/client/{idClient}', [UserController::class, "UsersInfo"]);
Route::get('/client/{idClient}/favori', [UserController::class, "listeFavori"]);
Route::get('/client/{idClient}/commandes', [UserController::class, "listeCommande"]);