<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FAVORI;
use App\Models\COMMANDE;
use App\Models\RESTAURANT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function listeUsers()
    {
        return response()->json(
            User::join('CLIENT','CLIENT.id','=','USERS.id')
            ->whereRaw('CLIENT.id = USERS.id')
            ->get()
        );
    }


    function listeFavori($idClient)
    {
        $listRest = FAVORI::where('id', $idClient)->get('id_restaurant');
        $resp = [];

        foreach( $listRest as $id)
        {   
            $resto = RESTAURANT::where("RESTAURANT.ID_RESTAURANT", $id["id_restaurant"])->get();
            array_push($resp,$resto[0]);
        }
        return ($resp);
    }


    function listeCommande($idClient)
    {
        return response()->json(COMMANDE::where('id', $idClient)->get());
    }
    function UsersInfo($idClient)
    {
        return response()->json(User::where("id",$idClient)->get());
    }
    function listeNonPayerCommande($idClient)
    {
        error_log(COMMANDE::where('ID',"=", $idClient)
        ->where('DATE_REGLEMENT_COMMANDE',"!=",null)
        ->toSql());

        return response()->json(COMMANDE::where('ID',"=", $idClient)
        ->where('DATE_REGLEMENT_COMMANDE',"=",null)
        ->get());
    }
}
