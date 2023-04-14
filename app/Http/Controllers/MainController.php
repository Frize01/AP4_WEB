<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServeurController;

class MainController extends Controller
{
    function dashboard()
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();
        
        // Vérifier si l'utilisateur est un client ou un serveur en utilisant la politique UserPolicy
        if ($user->can('view', User::class)) {
            $classe = new ClientController;
            $commandes = $client->commandesGet(auth()->id());
        } else {
            $classe = new ServeurController;
        }


        
    }
}
