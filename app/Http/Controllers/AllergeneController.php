<?php

namespace App\Http\Controllers;

use App\Models\ALLERGENE;
use Illuminate\Http\Request;

class AllergeneController extends Controller
{
    function listeAllergene($idRestaurant)
    {
        //recuperation des recettes
        return response()->json(ALLERGENE::where("ID_RESTAURANT","=",$idRestaurant)->get());
    }

    function ajoutAllergene(Request $request)
    {
        //variable for json return
        $code = 0;
        $message = "erreur";

        if($request->ID_RESTAURANT != null)
        {
            //Création new table
            $NewAllerg = new ALLERGENE;

            //remplir avec donnée envoyer
            $NewAllerg->ID_RESTAURANT = $request->ID_RESTAURANT;
            $NewAllerg->ID_TABLE = $request->ID_TABLE;
            $NewAllerg->LIBELLE_TABLE = $request->LIBELLE_TABLE;
            
            //sauvegarde dans la bdd
            $NewAllerg->save();

            $code=200;
            $message = $NewAllerg;

        }
        else// La table n'est pas specifier
        {
            $code = 400;//changement du code 
        }
        //retour json
        return response()->json($message,$code);
    }

    function MajAllergene(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "erreur";

        //Récuperation de l'utilisateur
        $table = ALLERGENE::find($request->ID_TABLE);

        if($request->ID_RESTAURANT != null and $table->exists())
        {
            //remplir avec donnée envoyer
            $table->LIBELLE_TABLE = $request->LIBELLE_TABLE;
            $table->ID_RESTAURANT = $request->ID_RESTAURANT;
            
            //sauvegarde dans la bdd
            $table->save();

            $message= $table;

        }
        else// Le restaurant n'est pas specifier
        {
            $code = 400;//changement du code 
        }
        
        //retour json
        return response()->json($message,$code);
    }

    function delAllergene(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "";

        //recuperation du serveur
        $table = ALLERGENE::find($request->ID_TABLE);

        //verification si l'utilisateur est bien un serveur
        if($table->exists())
        {
            $table->delete();

            $message = "Allergene bien supprimer";
        }
        else// L'utilisateur n'est pas un serveur
        {
            $code = 400;//changement du code  
        }

        //retour json
        return response()->json($message,$code);

    }
}
