<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecetteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //liste de toute les recettes
    public function test_liste_restaurant()
    {
        $response = $this->get('/api/recettes');

        $response->assertStatus(200);
    }
    //liste des catégories disponible
    public function test_liste_categorie()
    {
        $response = $this->get('/api/recette/categories');

        $response->assertStatus(200);
    }
    //les information d'une rectte en particuliére
    public function test_info_recette()
    {
        $idRecette =  1;
        $response = $this->get('/api/recette/'.$idRecette);

        $response->assertStatus(200);
    }
    //liste des ingrediant présent dans la recette
    public function test_liste_ingrediants()
    {
        $idRecette =  1;
        $response = $this->get("/api/recette/".$idRecette.'/ingrediants');

        $response->assertStatus(200);
    }
    //liste des alergenes dans la recette
    public function test_liste_allergenes()
    {
        $idRecette =  1;
        $response = $this->get("/api/recette/".$idRecette.'/allergenes');

        $response->assertStatus(200);
    }
    //liste des catégorie qui est lier a cette recette
    public function test_categorie_recette()
    {
        $idRecette =  1;
        $response = $this->get("/api/recette/".$idRecette.'/categories');

        $response->assertStatus(200);
    }
    //liste les recette lier a un resaturant
    public function test_liste_recette_restaurant()
    {
        $idRestaurant =  1;
        $response = $this->get("/api/recette/restaurant/".$idRestaurant);

        $response->assertStatus(200);
    }
    
}
