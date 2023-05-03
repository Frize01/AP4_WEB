<?php

namespace App\Http\Controllers;

use App\Models\TABLECLIENT;
use Illuminate\Http\Request;

class TableController extends Controller
{
    function listeTable($idRestaurant)
    {
        return response()->json(TABLECLIENT::where("ID_RESTAURANT","=",$idRestaurant)->get());
    }

    function ajoutTable(Request $request)
    {
        //variable for json return
        $code = 0;
        $message = "erreur";

        if($request->ID_RESTAURANT != null)
        {
            //Création new table
            $NewTable = new TABLECLIENT;

            //remplir avec donnée envoyer
            $NewTable->ID_RESTAURANT = $request->ID_RESTAURANT;
            $NewTable->ID_TABLE = $request->ID_TABLE;
            $NewTable->LIBELLE_TABLE = $request->LIBELLE_TABLE;
            
            //sauvegarde dans la bdd
            $NewTable->save();

            $code=200;
            $message = $NewTable;

        }
        else// La table n'est pas specifier
        {
            $code = 400;//changement du code 
        }
        //retour json
        return response()->json($message,$code);
    }

    function MajTable(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "erreur";

        //Récuperation de l'utilisateur
        $table = TABLECLIENT::find($request->ID_TABLE);

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

    function delTable(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "";

        //recuperation du serveur
        $table = TABLECLIENT::find($request->ID_TABLE);

        //verification si l'utilisateur est bien un serveur
        if($table->exists())
        {
            $table->delete();

            $message = "Table bien supprimer";
        }
        else// L'utilisateur n'est pas un serveur
        {
            $code = 400;//changement du code  
        }

        //retour json
        return response()->json($message,$code);

    }
}
