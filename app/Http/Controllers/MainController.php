<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SERVEUR;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServeurController;

class MainController extends Controller
{
    function dashboard(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = $request->user();
        
        // Vérifier si l'utilisateur est un client ou un serveur en utilisant la politique UserPolicy
        if ($user->can('view', User::class)) {
            $classe = new ClientController;
            $commandes = $classe->commandesGet(auth()->id());
            $commandesSurPlace = $commandes["sur_place"];
            $commandesEmporter = $commandes["a_emporter"];
            return view('dashboard',['commandesSurplace' => $commandesSurPlace, 'commandesEmporter' => $commandesEmporter]);
        } 
        else {
            $classe = new ServeurController;
            $serveur = SERVEUR::find(auth()->id());
            $commandes = $classe->commandesGet($serveur->ID_RESTAURANT);
            return view('dashboard',['commandesServeur' => $commandes]);
        }
    }
}
