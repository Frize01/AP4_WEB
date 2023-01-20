<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
class restaurantController extends Controller
{
    function Restaurantlist(){
        return view("restaurant", ["restaurants" => RESTAURANT::all()]);
    }

    function RestaurantTemplate($id){
        return view('site_restaurant',["restaurant" => RESTAURANT::find($id)]);
    }

}
