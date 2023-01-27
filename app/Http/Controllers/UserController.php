<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\COMMANDE;
use App\Models\FAVORI;

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
        return response()->json(FAVORI::where('id', $idClient)->get('id_restaurant'));
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
