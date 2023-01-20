<?php

namespace App\Http\Controllers;

use App\Models\RECETTE;
use App\Models\RESTAURANT;
use Illuminate\Http\Request;

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
}
