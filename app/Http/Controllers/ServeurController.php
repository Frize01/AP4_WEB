<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SERVEUR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServeurController extends Controller
{
    function listeServeur()
    {
        return response()->json(SERVEUR::all());

    }

    function ajoutServeur(Request $request)
    {
        //variable for json return
        $code = 0;
        $message = "";

        if($request->ID_RESTAURANT != null)
        {
            //Création new utilisateur
            $NewUser = new User;

            //remplir avec donnée envoyer
            $NewUser->name = $request->name;
            $NewUser->email = $request->email;
            $NewUser->password = bcrypt($request->password);
            
            //sauvegarde dans la bdd
            $NewUser->save();

            //Création new serveur
            $NewServeur = new SERVEUR;

            //remplir avec donnée envoyer
            $NewServeur->ID = $NewUser->id;
            $NewServeur->ID_RESTAURANT = $request->ID_RESTAURANT;

            $NewServeur->save();

            $code=200;
            $message = $NewUser;

        }
        else// Le restaurant n'est pas specifier
        {
            $code = 400;//changement du code 
        }
        //retour json
        return response()->json($message,$code);

        
    }

    function MajServeur(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "";

        //Récuperation de l'utilisateur
        $User = User::find($request->ID);

        if($request->ID_RESTAURANT != null and $User->exists())
        {
            //remplir avec donnée envoyer
            $User->name = $request->name;
            $User->email = $request->email;
            if($request->password != null)
            {
                $User->password = bcrypt($request->password);
            }
            
            //sauvegarde dans la bdd
            $User->save();

            //Création new serveur
            $Serveur = SERVEUR::find($User->id);

            //remplir avec donnée envoyer
            $Serveur->ID = $User->id;
            $Serveur->ID_RESTAURANT = $request->ID_RESTAURANT;

            $Serveur->save();

            $message = $User;

        }
        else// Le restaurant n'est pas specifier
        {
            $code = 400;//changement du code 
        }
        
        //retour json
        return response()->json($message,$code);

    }

    function delServeur(Request $request)
    {
        //variable for json return
        $code = 200;
        $message = "";

        //recuperation du serveur
        $ServeurU = USER::find($request->ID);

        //verification si l'utilisateur est bien un serveur
        if(SERVEUR::where("ID","=",$request->ID)->exists())
        {
            //recuperation du profil serveur
            $ServeurS = SERVEUR::find($request->ID);


            // Supression de l'utilisateur & table serveur
            $ServeurS->delete();
            $ServeurU->delete();

            $message = "Serveur bien supprimer";
        }
        else// L'utilisateur n'est pas un serveur
        {
            $code = 400;//changement du code  
        }

        //retour json
        return response()->json($message,$code);

    }
}
