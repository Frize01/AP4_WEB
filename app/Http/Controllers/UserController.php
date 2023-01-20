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
        return response()->json(User::all());
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
}
