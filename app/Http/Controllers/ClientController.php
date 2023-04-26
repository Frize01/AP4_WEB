<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class ClientController extends Controller
{
    function commandesGet($id_user)
    {
        $commandes_sur_place = COMMANDE::join('SUR_PLACE', 'COMMANDE.ID_COMMANDE', '=', 'SUR_PLACE.ID_COMMANDE')
        ->join('RESTAURANT', 'RESTAURANT.ID_RESTAURANT', '=', 'SUR_PLACE.ID_RESTAURANT')
        ->where('COMMANDE.ID', '=', $id_user)
        ->get();

        $commandes_a_emporter = COMMANDE::join('A_EMPORTER', 'COMMANDE.ID_COMMANDE', '=', 'A_EMPORTER.ID_COMMANDE')
        ->join('RESTAURANT', 'RESTAURANT.ID_RESTAURANT', '=', 'A_EMPORTER.ID_RESTAURANT')
        ->where('COMMANDE.ID', '=', $id_user)
        ->get();
        
        return ["a_emporter" => $commandes_a_emporter, "sur_place" => $commandes_sur_place ];
    }
}
