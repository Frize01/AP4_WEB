<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServeurController extends Controller
{
    function commandesGet($id_restaurant)
    {
        $commandes_sur_place = COMMANDE::join('SUR_PLACE', 'ID_COMMANDE', '=', 'SUR_PLACE.ID_COMMANDE')
        ->where('ID_RESTAURANT', '=', $id_restaurant)
        ->where('DATE_FIN_COMMANDE', '=', NULL)
        ->get();

        $commandes_a_emporter = COMMANDE::join('A_EMPORTER', 'ID_COMMANDE', '=', 'A_EMPORTER.ID_COMMANDE')
        ->where('ID_RESTAURANT', '=', $id_restaurant)
        ->where('HEURE_RECUP_COMMANDE', '=', NULL)
        ->get();

        return ["a_emporter" => $commandes_a_emporter, "sur_place" => $commandes_sur_place ];
    }

    function validateCommande($idcommande)
    {
        $commande = COMMANDE::find($idcommande);
        $commande->DATE_REGLEMENT_COMMANDE = date("Y-m-d H:i:s");
        return view("dashboard");
    }

    function deleteCommande($idcommande)
    {
        $commande = COMMANDE::find($idcommande);
        $commande->destroy();
        return view("dashboard");
    }
    
}
