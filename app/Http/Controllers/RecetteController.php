<?php

namespace App\Http\Controllers;

use App\Models\STOCK;
use App\Models\RECETTE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\INGREDIANT;

class RecetteController extends Controller
{
    function infoRecette($id){
        return response()->json(RECETTE::all());
    }
    function listeIngrediant($id){

        return response()->json(
        RECETTE::join('CONTIENT','CONTIENT.id_recette','=','RECETTE.id_recette')
        ->join('INGREDIANT','INGREDIANT.id_ingredant','=','CONTIENT.id_ingredant')
        ->where('RECETTE.id_recette',$id)
        ->get("nom_ingrediant"));
        
    }

    function listeAllergene($id){
        return response()->json(RECETTE::all());
    }

    function listeCategorie($id){
        return response()->json(RECETTE::where('RECETTE.id_categorie',$id)
        ->join('CATEGORIE','CATEGORIE.id_categorie',"=","RECETTE.id_recette")
        ->get("libelle_categorie"));
    }
}