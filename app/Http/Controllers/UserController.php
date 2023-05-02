<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\STAFF;
use App\Models\CLIENT;
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
            User::join('CLIENT', 'CLIENT.id', '=', 'USERS.id')
                ->whereRaw('CLIENT.id = USERS.id')
                ->get()
        );
    }

    function listeFavori($idClient)
    {
        $listRest = FAVORI::where('id', $idClient)->get('id_restaurant');
        $resp = [];

        foreach ($listRest as $id) {
            $resto = RESTAURANT::where("RESTAURANT.ID_RESTAURANT", $id["id_restaurant"])->get();
            array_push($resp, $resto[0]);
        }
        if ($resp == null) {

            return response()->json(['message' => 'Les favoris sont vide'], 204);
        } else {
            return ($resp);
        }
    }

    function listeCommande($idClient)
    {
        return response()->json(COMMANDE::where('id', $idClient)->get());
    }
    function UsersInfo($idClient)
    {
        return response()->json(User::where("id", $idClient)->get());
    }
    function listeNonPayerCommande($idClient)
    {
        return response()->json(COMMANDE::where('ID', "=", $idClient)
            ->where('DATE_REGLEMENT_COMMANDE', "=", null)
            ->get());
    }
    //Write data on database

    function newFavori(Request $request)
    {
        $tmpFav = new FAVORI();

        $tmpFav->ID = $request->ID;
        $tmpFav->ID_RESTAURANT = $request->ID_RESTAURANT;

        //$tmpFav->save();
        $tmpFav->save();
    }

    function loginSTAFF(Request $request)
    {
        $login_exist = User::where('email', "=",$request->email)->limit(1)->get();

        if(password_verify($request->password,$login_exist[0]->password))
        {
            if(STAFF::where('ID',"=",$login_exist[0]->id)->exists())
            {
                $staff = STAFF::where('ID',"=",$login_exist[0]->id)->get("ID_RESTAURANT");
                $data = [];
                array_push($data,['id' => $login_exist[0]->id,
                                'name' => $login_exist[0]->name,
                                'email' => $login_exist[0]->email,
                                "Id_Restorant" => $staff[0]->ID_RESTAURANT
            ]);
                $retour = $data;
                $code = 200;
            }
            else
            {
                $retour = [];
                $code = 400;
            }
        }
        else
        {
            $retour = [];
            $code = 400;
        }
        
        return response()->json($retour,$code);
    }

    function loginCLIENT(Request $request)
    {
        $login_exist = User::where('email', "=",$request->email)->limit(1)->get();

        if(password_verify($request->password,$login_exist[0]->password))
        {
            if(CLIENT::where('ID',"=",$login_exist[0]->id)->exists())
            {
                $data = [];
                array_push($data,['id' => $login_exist[0]->id,
                                'name' => $login_exist[0]->name,
                                'email' => $login_exist[0]->email
            ]);
                $retour = $data;
                $code = 200;
            }
            else
            {
                $retour = [];
                $code = 400;
            }
        }
        else
        {
            $retour = [];
            $code = 400;
        }
        
        return response()->json($retour,$code);
    }
}
