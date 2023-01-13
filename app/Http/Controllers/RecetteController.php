<?php

namespace App\Http\Controllers;

use App\Models\STOCK;
use App\Models\RECETTE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecetteController extends Controller
{
    function infoRecette($id){
        return response()->json(RECETTE::all());
    }
    function listeIngrediant($id){
        $stock = STOCK::where('id_ingrediant',$id);
        return response()->json($stock->join('INGREDIANT','INGREDIANT.id_ingredant','=','STOCK.id_ingredant')->get("nom_ingrediant"));
    }

    function listeAllergene($id){
        return response()->json(RECETTE::all());
    }

    function listeCategorie(){
        return response()->json(RECETTE::all());
    }
}



