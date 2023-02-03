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
}