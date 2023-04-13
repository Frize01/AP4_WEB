<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //liste des clients
    public function test_liste_client()
    {
        $response = $this->get('/api/clients');

        $response->assertStatus(200);
    }
    //Information d'un client
    public function test_info_client()
    {
        $idClient = 1;

        $response = $this->get('/api/client/'.$idClient);

        $response->assertStatus(200);
    }
    //liste des favoris du client
    public function test_liste_favoris_client()
    {
        $idClient = 1;

        $response = $this->get('/api/client/'.$idClient.'/favori');

        $response->assertStatus(200);
    }
    //liste des commandes du client
    public function test_liste_commandes_client()
    {
        $idClient = 1;

        $response = $this->get('/api/client/'.$idClient.'/commandes');

        $response->assertStatus(200);
    }
    //liste des commandes non payer du client
    public function test_liste_commandes_non_payer()
    {
        $idClient = 1;

        $response = $this->get('/api/client/'.$idClient.'/NonPayerCommandes');

        $response->assertStatus(200);
    }
}
