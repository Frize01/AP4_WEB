<?php

namespace App\Http\Controllers;

use App\Models\RESTAURANT;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    function listeRestaurant()
    {
        return response()->json(RESTAURANT::all());
    }
}
