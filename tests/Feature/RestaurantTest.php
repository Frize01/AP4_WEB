<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //liste des restaurant
    public function test_liste_resto()
    {
        $response = $this->get('/api/restaurants');

        $response->assertStatus(200);
    }
    //Information d'un restaurant
    public function test_info_resto()
    {
        $idResto = 1;

        $response = $this->get('/api/restaurant/'.$idResto);

        $response->assertStatus(200);
    }
    //liste des recette disponible par restaurant
    public function test_liste_recette_resto()
    {
        $idResto = 1;

        $response = $this->get('/api/restaurant/'.$idResto.'/recettes/');

        $response->assertStatus(200);
    }
}
