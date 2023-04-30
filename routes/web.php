<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\restaurantController;
use App\Http\Controllers\payementController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServeurController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/restaurant', [restaurantController::class, 'RestaurantList']);
Route::get('/restaurant/{id}', [restaurantController::class, 'RestaurantTemplate']);

Route::get('/dashboard', [MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/commande_sur_place', [ServeurController::class, 'commandeDashboard'])->middleware(['auth', 'verified']);
Route::post('/ajout_produit', [ServeurController::class, 'ajouterProduit'])->middleware(['auth', 'verified']);
Route::post('/supprimer_produit', [ServeurController::class, 'supprimerProduit'])->middleware(['auth', 'verified']);

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
