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
        return response()->json(RECETTE::where("RECETTE.ID_RESTAURANT",$id)->get());
    }
    function RestaurantInfo($id)
    {
        return response()->json(RESTAURANT::where("RESTAURANT.ID_RESTAURANT",$id)->get());

    }
    function StaffRestaurant($id)
    {
        $staff = STAFF::where('ID',$id)->get();
        error_log($staff[0]->ID_RESTAURANT);

        if($staff != null)
        {
            return $this->RestaurantInfo($staff[0]->ID_RESTAURANT);
        }

    }
}
