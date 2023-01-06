<?php

namespace App\Http\Controllers;

use App\Models\STOCK;
use App\Models\RECETTE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecetteController extends Controller
{
    function infoRecette($id){

    }
    function listeIngrediant($id){
        $stock = STOCK::where('id',$id);
        return response()->json($stock->join('ingrediant','ingrediant.id_ingrediant','=','stock.id_ingrediant')->get("nom_ingrediant"));
    }
    function listeAllergene($id){
        return response()->json(RECETTE::all());
    }

    function listeCategorie(){
        return response()->json(RECETTE::all());
    }
}
