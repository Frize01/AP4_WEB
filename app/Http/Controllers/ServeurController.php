<?php

namespace App\Http\Controllers;
use App\Models\SERVEUR;
use App\Models\COMMANDE;
use App\Models\TVA;
use App\Models\SURPLACE;
use App\Models\COMPOSER;
use App\Models\STOCK;
use App\Models\RECETTE;
use App\Models\RESTAURANT;
use App\Models\CONTIENT;
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
        return RECETTE::where('RECETTE.ID_RESTAURANT', $id_restaurant)
               ->get();
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
        $restaurantClasse = RESTAURANT::find($serveur->ID_RESTAURANT);
        $recette = $restaurant->getRecette($serveur->ID_RESTAURANT);
        $recettes_commande = $classe->getRecetteForList($serveur->ID_RESTAURANT);

        return view("commande", ["restaurant" => $restaurantClasse, "recettes" => $recette, "recettes_commande" => $recettes_commande]);
    }

    function ajouterProduit() {
        $classe = new ServeurController;
        $serveur = SERVEUR::find(auth()->id());
        if (empty($serveur))
        {
            return redirect("/aaa");
        }
        if (!session()->has('produits'))
        {
            session()->put('produits', []);
            session()->put('prix', 0);
        }
        //Récupération de l'id et du prix
        $produit_id = intval(htmlspecialchars($_POST["produit"]));
        $produit = $classe->getRecette($produit_id);
        //Ajout à la liste
        $liste_produits = session()->get('produits');
        $liste_produits[] = $produit_id;
        session()->put('produits', $liste_produits);
        //Ajout du prix du produit dans le total de la commande
        $prix = session()->get('prix');
        $prix = $prix + $produit->PRIXHT;
        session()->put('prix', $prix);
        return redirect("/dashboard/commande_sur_place");
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
        $liste_produits = session()->get('produits');
        $produit_key = intval(htmlspecialchars($_POST["produit"]));
        $produit = $classe->getRecette($liste_produits[$produit_key]);
        unset($liste_produits[$produit_key]);
        $liste_produits = array_values($liste_produits);
        //Enlever le prix du produit de la commande
        $prix = session()->get('prix');
        $prix = $prix - $produit->PRIXHT;
        session()->put('produits', $liste_produits);
        session()->put('prix', $prix);
        return redirect("/dashboard/commande_sur_place");
    }

    function getRecette($id_recette)
    {
        return RECETTE::select('RECETTE.ID_RECETTE AS ID_RECETTE', 'RECETTE.PRIXHT AS PRIXHT')
        ->where('ID_RECETTE', $id_recette)
        ->first();
    }

    function validationCommande()
    {
        $classe = new ServeurController;
        $serveur = SERVEUR::find(auth()->id());
        if (empty($serveur))
        {
            return redirect("/aaa");
        }
        //Récupération de l'idMAX de la commande
        $idmax = COMMANDE::max('ID_COMMANDE');
        $idcommande=$idmax+1;
        //Récupération de la TVA actuelle
        $tva = TVA::select('ID_TVA', 'POURCENTAGE_TVA')
            ->where('ID_TYPE_TVA', '=', 3)
            ->orderByDesc('DATE_INSERTION')
            ->first();
        //Insertion des commandes
        if (!session()->has('produits'))
        {
            return redirect("/dashboard/commande_sur_place");
        }
        $commande = COMMANDE::create(['ID_COMMANDE' => $idcommande, 'ID_TYPE_TVA' => 3, 'ID_TVA' => $tva->ID_TVA, 'PRIX_COMMANDE' => session()->get('prix')]);
        $sur_place = SURPLACE::create(['ID_COMMANDE' => $commande->ID_COMMANDE, 'ID_TABLE' => 1, 'ID_RESTAURANT' => $serveur->ID_RESTAURANT, 'ID' => $serveur->ID]);
        foreach (session()->get('produits') as $produit)
        {
            COMPOSER::create(['ID_RESTAURANT' => $serveur->ID_RESTAURANT, 'ID_RECETTE' => $produit, 'ID_COMMANDE' => $commande->ID_COMMANDE]);
            $classe->reductionStock($produit, $serveur->ID_RESTAURANT);
        }
        session()->forget('produits');
        session()->forget('prix');
        return redirect("/dashboard");

    }

    function reductionStock($id_produit, $id_restaurant)
    {
        $serveur = SERVEUR::find(auth()->id());
        $ingredients = CONTIENT::select('ID_INGREDANT', 'COUT_INGREDIENT')
                ->where('ID_RECETTE', '=', $id_produit)
                ->where('ID_RESTAURANT', '=', $id_restaurant)
                ->get();
        foreach ($ingredients as $ingredient)
        {
            STOCK::where('ID_INGREDANT', '=', $ingredient->ID_INGREDANT)
            ->where('ID_RESTAURANT', '=', $id_restaurant)
            ->decrement('STOCK_ING', $ingredient->COUT_INGREDIENT);
        }

        return true;
    }
    
}
