<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\COMMANDE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AEMPORTER;
use App\Models\RECETTE;
use App\Models\COMPOSER;

class CommandeController extends Controller
{
    function ajouterCommandeEmporter(Request $request)
    {
        // definition des parametre pour la commande
        $commande = new COMMANDE();

        $request->typeCommande;
        $commande->ID = $request->idUser;
        $commande->ID_COMMANDE = COMMANDE::max("ID_COMMANDE") + 1;
        $commande->ID_TYPE_TVA = 2;
        $commande->ID_TVA = 2;
        $commande->DATE_COMMANDE = date_create()->format('Y-m-d H:i:s');
        $commande->PRIX_COMMANDE = RECETTE::find($request->ID_RECETTE)->PRIXHT;//$request->prix;
        $commande->DATE_REGLEMENT_COMMANDE = null;

        //Remplie le a emporter
        $a_emporter = new AEMPORTER();

        $a_emporter->ID = $request->idUser; 
        $a_emporter->ID_COMMANDE = $commande->ID_COMMANDE;
        $a_emporter->ID_RESTAURANT = $request->ID_RESTAURANT;
        if($request->description != null)
        {
            $a_emporter->DESCRIPTION_COMMANDE = $request->description;
        }
        $a_emporter->RECUPERER = 0;
        $a_emporter->HEURE_RECUP_COMMANDE = null;

        $lien = new COMPOSER();

        $lien->ID_RESTAURANT = $request->ID_RESTAURANT;
        $lien->ID_RECETTE = $request->ID_RECETTE;
        $lien->ID = $request->idUser;
        $lien->ID_COMMANDE = $commande->ID_COMMANDE;
        $lien->ID_COMPOSITION = COMPOSER::max("ID_COMPOSITION") + 1;


        //sauvegarde
        $commande->save();
        $a_emporter->save();
        $lien->save();

        return response()->json($commande);
        // ne pas oublier de save() pour chaque cas
    }
}