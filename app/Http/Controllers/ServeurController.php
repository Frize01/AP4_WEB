<?php

namespace App\Http\Controllers;
use App\Models\COMMANDE;
use App\Http\Controllers\restaurantController;

use Illuminate\Http\Request;

class ServeurController extends Controller
{
    function commandesGet($id_restaurant, $id_user)
    {
        $commandes_sur_place = COMMANDE::join('SUR_PLACE', 'COMMANDE.ID_COMMANDE', '=', 'SUR_PLACE.ID_COMMANDE')
        ->where('SUR_PLACE.ID_RESTAURANT', '=', $id_restaurant)
        ->where('SUR_PLACE.DATE_FIN_COMMANDE', '=', NULL)
        ->where('SUR_PLACE.ID', '=', $id_user)
        ->get();

        $commandes_a_emporter = COMMANDE::join('A_EMPORTER', 'COMMANDE.ID_COMMANDE', '=', 'A_EMPORTER.ID_COMMANDE')
        ->where('A_EMPORTER.ID_RESTAURANT', '=', $id_restaurant)
        ->where('A_EMPORTER.HEURE_RECUP_COMMANDE', '=', NULL)
        ->get();

        return ["a_emporter" => $commandes_a_emporter, "sur_place" => $commandes_sur_place ];
    }

    function getRecetteForList($id_restaurant)
    {
        return Recette::select('ID_RECETTE')
               ->where('RECETTE.ID_RESTAURANT', $id_restaurant);
    }

    function validateCommande($idcommande)
    {
        $commande = COMMANDE::find($idcommande);
        $commande->DATE_REGLEMENT_COMMANDE = date("Y-m-d H:i:s");
        return view("dashboard");
    }

    function deleteCommande($idcommande)
    {
        $commande = COMMANDE::find($idcommande);
        $commande->destroy();
        return view("dashboard");
    }

    //DASHBOARD COMMANDE SUR PLACE

    function commandeDashboard()
    {
        $classe = new ServeurController;
        $serveur = SERVEUR::find(auth()->id());
        if (empty($serveur))
        {
            return redirect("/aaa");
        }
        $restaurant = new restaurantController();
        $recette = $restaurant->getRecette($serveur->ID_RESTAURANT);
        $recettes_commande = $restaurant->getRecetteForList($serveur->ID_RESTAURANT);

        return view("/commandeDashboard", ["recettes" => $recette, "recettes_commande" => $recettes_commande]);
    }

    function ajouterProduit() {
        $classe = new ServeurController;
        $serveur = SERVEUR::find(auth()->id());
        if (empty($serveur))
        {
            return redirect("/aaa");
        }
        if (!isset($_SESSION['commande']))
        {
            $_SESSION['commande'] = [];
            $_SESSION['prix'] = 0;
        }
        //Ajout du produit dans la commande
        $produit_id = htmlspecialchars($_POST["produit"]);
        array_push($_SESSION['commande'], $produit_id);
        //Ajout du prix du produit dans le total de la commande
        $_SESSION['prix'] = $_SESSION['prix'] + getRecette($produit_id)->PRIXHT;
        return redirect("/commandeDashboard");
    }

    function getRecette($id_recette)
    {
        return RECETTE::where('RECETTE.ID_RECETTE', '=', $id_recette);
    }
    
    // Fonction pour supprimer un produit de la commande
    function supprimerProduit() {
        $classe = new ServeurController;
        $serveur = SERVEUR::find(auth()->id());
        if (empty($serveur))
        {
            return redirect("/aaa");
        }
        //Supprimer un produit de la liste de commande
        $produit_key = htmlspecialchars($_POST["produit"]);
        $unset($_SESSION['commande'][$produit_key]);
        //Enlever le prix du produit de la commande
        $_SESSION['prix'] = $_SESSION['prix'] - getRecette($_SESSION['commande'][$produit_key])->PRIXHT;
        return redirect("/commandeDashboard");
    }
    
}
