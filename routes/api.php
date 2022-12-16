<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/test', function (Request $request) {
    $data = array("a" => "Apple", "b" => "Ball", "c" => "Cat","test" => 12,"test2"=>array("test"=>54,));

    header("Content-Type: application/json");
    return response()->json($data);
});
//Global
Route::get('/Recettes', [GlobalController::class, "listeRecette"]);
Route::get('/restaurants', [GlobalController::class, "listeRestaurant"]);

//restaurants

//Recette
Route::get('/recette/{id}', [RecetteController::class, "infoRecette"]);

Route::get('/recette/ingredients', [RecetteController::class, "listeIngredient"]);
Route::get('/recette/allergenes', [RecetteController::class, "listeAllergene"]);
Route::get('/recette/categories', [RecetteController::class, "listecategorie"]);


//Client
Route::get('/clients/', [UserController::class, "listeUsers"]);
Route::get('/client/{id}/favori', [ClientController::class, "listeFavori"]);
Route::get('/client/{id}/commandes', [ClientController::class, "listeCommande"]);