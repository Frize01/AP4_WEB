<?php

namespace App\Http\Controllers;

use App\Models\RECETTE;

use App\Http\Controllers\Controller;
use App\Models\ALLERGENE;
use App\Models\CATEGORIE;
use App\Models\CONSERNER;

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
        
        $listIng = RECETTE::join('CONTIENT','CONTIENT.id_recette','=','RECETTE.id_recette')
        ->join('INGREDIANT','INGREDIANT.id_ingredant','=','CONTIENT.id_ingredant')
        ->where('RECETTE.id_recette',$id)
        ->get("INGREDIANT.id_ingredant");

        $resp = [];

        foreach( $listIng as $id)
        {   
            $tmp = CONSERNER::where('CONSERNER.ID_INGREDIANT','=',$id["id_ingredant"])
                ->join('ALLERGENE','ALLERGENE.ID_ALLERGENE','=','CONSERNER.ID_ALLERGENE')
                ->get("ALLERGENE.LIBELLE_ALLERGENE");
            
            if($tmp != "[]")
            {
                array_push($resp,$tmp);
            }
        }
        
        return ($resp);
    }
    
            // ALLERGENE::join('CONSERNER','CONSERNER.id_ingrediant','=','RECETTE.id_recette')
            // ->join('ALLERGENE','ALLERGENE.id_ingredant','=','INGREDIANT.id_ingredant')
            // ->where('ALLERGENE.ID_INGREDIANT',$id)

    function listeCategorieRecette($id){
        return response()->json(
            RECETTE::where('RECETTE.ID_CATEGORIE',$id)
            ->join('CATEGORIE','CATEGORIE.ID_CATEGORIE','=','RECETTE.ID_CATEGORIE')
            ->get("LIBELLE_CATEGORIE")
        );
    }

    function listeRecetteRestaurant($id)
    {
        return response()->json(
            RECETTE::select('RECETTE.ID_RECETTE','RECETTE.ID_CATEGORIE','RECETTE.NOM_RECETTE','RECETTE.DESCRIPTION_RECETTE','RECETTE.PHOTO_RECETTE','RECETTE.PRIXHT')
            ->join('RESTAURANT','RECETTE.id_restaurant','=','RESTAURANT.id_restaurant')
            ->where('RESTAURANT.id_restaurant',$id)
            ->get("ID_RECETTE"));
    }
    function listeRecette()
    {
        return response()->json(RECETTE::all());
    }
}