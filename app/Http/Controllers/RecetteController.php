<?php

namespace App\Http\Controllers;

use App\Models\RECETTE;

use App\Http\Controllers\Controller;
use App\Models\CATEGORIE;

class RecetteController extends Controller
{
    function infoRecette($id){
        return response()->json(RECETTE::where('RECETTE.ID_RECETTE', $id)->get());
    }

    function listeIngrediant($id){

        return response()->json(
        RECETTE::join('CONTIENT','CONTIENT.id_recette','=','RECETTE.id_recette')
        ->join('INGREDIANT','INGREDIANT.id_ingredant','=','CONTIENT.id_ingredant')
        ->where('RECETTE.id_recette',$id)
        ->get("nom_ingrediant"));
        
    }

    function listeCategorie(){
        return response()->json(CATEGORIE::all());
    }

    function listeAllergene($id){
        return response()->json(RECETTE::all());
    }

    function listeCategorieRecette($id){
        return response()->json(
            RECETTE::where('RECETTE.ID_CATEGORIE',$id)
            ->join('CATEGORIE','CATEGORIE.ID_CATEGORIE','=','RECETTE.ID_CATEGORIE')
            ->get("LIBELLE_CATEGORIE")
        );
    }

    function listeRecette()
    {
        return response()->json(RECETTE::all());
    }
}