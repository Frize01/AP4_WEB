<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\restaurantController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/restaurant', [restaurantController::class, 'Restaurantlist']);
Route::get('/template', [restaurantController::class, 'RestaurantTemplate']);
Route::get('/restaurant/{id}', [restaurantController::class, 'RestaurantTemplate']);