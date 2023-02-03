<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\COMMANDE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AEMPORTER;

class CommandeController extends Controller
{
    function ajouterCommande(Request $request)
    {
        // definition des parametre pour la commande
        $commande = new COMMANDE();

        $request->typeCommande;
        $commande->ID = $request->idUser;
        $commande->ID_TYPE_TVA = $request->type_tva;
        $commande->ID_TVA = $request->id_tva;
        $commande->DATE_COMMANDE = date_create()->format('Y-m-d H:i:s');
        $commande->PRIX_COMMANDE = $request->prix;
        $commande->DATE_REGLEMENT_COMMANDE = null;

        //si C'est a emporter
        if($request->typeCommande == 1){
            $a_emporter = new AEMPORTER();

            $a_emporter->DESCRIPTION_COMMANDE = $request->description;
            $a_emporter->RECUPERER = 0;
            $a_emporter->HEURE_RECUP_COMMANDE = null;

        }
        else if($request->typeCommande == 2){

        }
        else
            return response()->json("erreur, type de commande mal renseigner");

        return response()->json($commande);
        // ne pas oublier de save() pour chaque cas
    }
}