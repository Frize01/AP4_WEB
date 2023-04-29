<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RESTAURANT;
use App\Models\RECETTE;
use App\Http\Controllers\RecetteController;
class restaurantController extends Controller
{
    function Restaurantlist(){
        return view("restaurant", ["restaurants" => RESTAURANT::all()]);
    }

    function RestaurantTemplate($id){
        $restaurantCon = new restaurantController;
        $restaurant = RESTAURANT::find($id);
        $recette = $restaurantCon->getRecette($id);
        if ($restaurant===NULL)
        {
            return redirect("/restaurant");
        }
        return view('site_restaurant',["restaurant" => $restaurant, "recettes" => $recette]);
    }

    function getRecette($id_restaurant)
    {
        return Recette::select('RECETTE.NOM_RECETTE AS NOM_RECETTE', 'RECETTE.DESCRIPTION_RECETTE AS DESCRIPTION_RECETTE', 'RECETTE.PHOTO_RECETTE AS PHOTO_RECETTE', 'PRIXHT', 'INGREDIANT.NOM_INGREDIANT AS NOM_INGREDIANT', 'ALLERGENE.LIBELLE_ALLERGENE AS LIBELLE_ALLERGENE', 'CATEGORIE.LIBELLE_CATEGORIE AS LIBELLE_CATEGORIE')
              ->join('CONTIENT', 'CONTIENT.ID_RECETTE', '=', 'RECETTE.ID_RECETTE')
              ->join('INGREDIANT', 'INGREDIANT.ID_INGREDANT', '=', 'CONTIENT.ID_INGREDANT')
              ->join('CONSERNER', 'CONSERNER.ID_INGREDIANT', '=', 'INGREDIANT.ID_INGREDANT')
              ->join('ALLERGENE', 'ALLERGENE.ID_ALLERGENE', '=', 'CONSERNER.ID_ALLERGENE')
              ->join('CATEGORIE', 'CATEGORIE.ID_CATEGORIE', '=', 'RECETTE.ID_CATEGORIE')
              ->where('RECETTE.ID_RESTAURANT', $id_restaurant)
              ->get();
    }

}
