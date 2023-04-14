<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class ClientController extends Controller
{
    function commandesGet($id_user)
    {
        $commandes_sur_place = COMMANDE::join('SUR_PLACE', 'ID_COMMANDE', '=', 'SUR_PLACE.ID_COMMANDE')
        ->where('ID', '=', $id_user)
        ->get();

        $commandes_a_emporter = COMMANDE::join('A_EMPORTER', 'ID_COMMANDE', '=', 'A_EMPORTER.ID_COMMANDE')
        ->where('ID', '=', $id_user)
        ->get();

        return ["a_emporter" => $commandes_a_emporter, "sur_place" => $commandes_sur_place ];
    }
}
