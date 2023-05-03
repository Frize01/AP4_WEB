<?php

namespace App\Http\Controllers;

use App\Models\RECETTE;

use App\Models\ALLERGENE;
use App\Models\CATEGORIE;
use App\Models\CONSERNER;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecetteController extends Controller
{
    function infoRecette($id)
    {
        return response()->json(RECETTE::where('RECETTE.ID_RECETTE', $id)->get());
    }

    function listeIngrediant($id)
    {

        return response()->json(
            RECETTE::join('CONTIENT', 'CONTIENT.id_recette', '=', 'RECETTE.id_recette')
                ->join('INGREDIANT', 'INGREDIANT.id_ingredant', '=', 'CONTIENT.id_ingredant')
                ->where('RECETTE.id_recette', $id)
                ->get("nom_ingrediant")
        );
    }

    function listeCategorie()
    {
        return response()->json(CATEGORIE::all());
    }

    function listeAllergene($id)
    {

        $listIng = RECETTE::join('CONTIENT', 'CONTIENT.id_recette', '=', 'RECETTE.id_recette')
            ->join('INGREDIANT', 'INGREDIANT.id_ingredant', '=', 'CONTIENT.id_ingredant')
            ->where('RECETTE.id_recette', $id)
            ->get("INGREDIANT.id_ingredant");

        $resp = [];

        foreach ($listIng as $id) {
            $tmp = CONSERNER::where('CONSERNER.ID_INGREDIANT', '=', $id["id_ingredant"])
                ->join('ALLERGENE', 'ALLERGENE.ID_ALLERGENE', '=', 'CONSERNER.ID_ALLERGENE')
                ->get("ALLERGENE.LIBELLE_ALLERGENE");

            if ($tmp != "[]") {
                array_push($resp, $tmp);
            }
        }

        return ($resp);
    }

    // ALLERGENE::join('CONSERNER','CONSERNER.id_ingrediant','=','RECETTE.id_recette')
    // ->join('ALLERGENE','ALLERGENE.id_ingredant','=','INGREDIANT.id_ingredant')
    // ->where('ALLERGENE.ID_INGREDIANT',$id)

    function listeCategorieRecette($id)
    {
        return response()->json(
            RECETTE::where('RECETTE.ID_CATEGORIE', $id)
                ->join('CATEGORIE', 'CATEGORIE.ID_CATEGORIE', '=', 'RECETTE.ID_CATEGORIE')
                ->get("LIBELLE_CATEGORIE")
        );
    }

    function listeRecetteRestaurant($id)
    {
        return response()->json(
            RECETTE::select('RECETTE.ID_RECETTE', 'RECETTE.ID_CATEGORIE', 'RECETTE.NOM_RECETTE', 'RECETTE.DESCRIPTION_RECETTE', 'RECETTE.PHOTO_RECETTE', 'RECETTE.PRIXHT')
                ->join('RESTAURANT', 'RECETTE.id_restaurant', '=', 'RESTAURANT.id_restaurant')
                ->where('RESTAURANT.id_restaurant', $id)
                ->get("ID_RECETTE")
        );
    }
    function listeRecette()
    {
        return response()->json(RECETTE::all());
    }

    //POST
    function ajoutRecette(Request $request)
    {
        //variable for json return
        $code = 0;
        $message = "erreur";

        if ($request->ID_RESTAURANT != null) {
            //Création new recette
            $NewRecette = new RECETTE;

            //remplir avec donnée envoyer
            $NewRecette->ID_RESTAURANT = $request->ID_RESTAURANT;
            $NewRecette->ID_RECETTE = RECETTE::max("ID_RECETTE") + 1; //prend le max de la valeur ID_RECETTE et rajoute 1
            $NewRecette->ID_CATEGORIE = $request->ID_CATEGORIE;
            $NewRecette->NOM_RECETTE = $request->NOM_RECETTE;
            $NewRecette->DESCRIPTION_RECETTE = $request->DESCRIPTION_RECETTE;
            $NewRecette->PHOTO_RECETTE = $request->PHOTO_RECETTE;
            $NewRecette->PRIXHT = $request->PRIXHT;

            //sauvegarde dans la bdd
            $NewRecette->save();

            $code = 200;
            $message = $NewRecette;
        } else // La recette n'est pas specifier
        {
            $code = 400; //changement du code 
        }
        //retour json
        return response()->json($message, $code);
    }

    function MajRecette(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "erreur";

        //Récuperation de la recettes
        $tmpRecettes = RECETTE::where("ID_RESTAURANT", "=", $request->ID_RESTAURANT)->first()->get();

        foreach ($tmpRecettes as $recette) {
            $Recette = $recette;
        }

        error_log($Recette);

        if ($request->ID_RESTAURANT != null and $Recette->exists()) {
            //remplir avec donnée envoyer
            $Recette->ID_RESTAURANT = $request->ID_RESTAURANT;
            $Recette->ID_RECETTE = $request->ID_RECETTE;
            $Recette->ID_CATEGORIE = $request->ID_CATEGORIE;
            $Recette->NOM_RECETTE = $request->NOM_RECETTE;
            $Recette->DESCRIPTION_RECETTE = $request->DESCRIPTION_RECETTE;
            $Recette->PHOTO_RECETTE = $request->PHOTO_RECETTE;
            $Recette->PRIXHT = $request->PRIXHT;

            //sauvegarde dans la bdd
            $Recette->save();

            $message = $Recette;
        } else // La recette n'est pas specifier
        {
            $code = 400; //changement du code 
        }

        //retour json
        return response()->json($message, $code);
    }

    function delRecette(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "";

        //recuperation de la recette
        $recette = RECETTE::find($request->ID_RECETTE);

        //verification si recette existe 
        if ($recette->exists()) {
            $recette->delete();

            $message = "Recette bien supprimer";
        } else // la recette n'existe pas
        {
            $code = 400; //changement du code  
        }

        //retour json
        return response()->json($message, $code);
    }
}
