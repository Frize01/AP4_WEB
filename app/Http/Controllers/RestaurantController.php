<?php

namespace App\Http\Controllers;

use App\Models\RECETTE;
use App\Models\RESTAURANT;
use App\Models\STAFF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Error;

class RestaurantController extends Controller
{
    function listeRestaurant()
    {
        return response()->json(RESTAURANT::all());
    }
    function RecetteDansRestaurant($id)
    {
        return response()->json(RECETTE::where("RECETTE.ID_RESTAURANT", $id)->get());
    }
    function RestaurantInfo($id)
    {
        $resto = RESTAURANT::where("RESTAURANT.ID_RESTAURANT", $id)->get();
        return response()->json($resto[0]);
    }
    function StaffRestaurant($id)
    {
        $staffs = STAFF::where('ID', $id)->get();
        foreach ($staffs as $staff) {
            if ($staff != null) {
                return $this->RestaurantInfo($staff->ID_RESTAURANT);
            }
        }
    }

    function ChangeRestaurant(Request $request)
    {
        //recuperation du restorant
        $Resto = RESTAURANT::where("ID_RESTAURANT","=",$request->id);

        //MAJ des differente donnée
        $Resto->ID_RESTAURANT = $request->ID_RESTAURANT;
        $Resto->NOM_RESTAURANT = $request->ID_RESTAURANT;
        $Resto->ADRESSE_RESTAURANT = $request->ADRESSE_RESTAURANT;
        $Resto->LOGO_RESTAURANT = $request->LOGO_RESTAURANT;
        $Resto->BG_RESTAURANT = $request->BG_RESTAURANT;
        $Resto->COULEUR_SITE = $request->COULEUR_SITE;

        //sauvegarde dans la bdd
        $Resto->save();
    }
}