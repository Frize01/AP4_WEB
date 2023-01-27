<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Recette;
class restaurantController extends Controller
{
    function Restaurantlist(){
        return view("restaurant", ["restaurants" => RESTAURANT::all()]);
    }

    function RestaurantTemplate($id){
        $restaurant = RESTAURANT::find($id);
        $recette = RECETTE::where('ID_RESTAURANT', $id)->get();
        if ($restaurant===NULL)
        {
            return redirect("/restaurant");
        }
        return view('site_restaurant',["restaurant" => $restaurant, "recette" => $recette]);
    }

}
