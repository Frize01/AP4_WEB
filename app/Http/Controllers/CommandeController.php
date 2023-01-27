<?php

namespace App\Http\Controllers;

use App\Models\COMMANDE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    function ajouterCommande(Request $request)
    {
        $commande = new COMMANDE();
        $commande->nom = $request->nom;
        $commande->ID_TYPE_TVA = $request->type_tva;
        $commande->ID_TVA = $request->id_tva;
        $commande->DATE_COMMANDE = $request->prix;
        $commande->PRIX_COMMANDE = $request->tva;
        $commande->DATE_REGLEMENT_COMMANDE = null;
        $commande->save();
        return response()->json($commande);
    }
}
