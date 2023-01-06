<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NOM_RESTAURANT' => fake()->company(),
            'ADRESSE_RESTAURANT' => fake()->address(),
            'LOGO_RESTAURANT' => fake()->imageUrl($width = 480, $height = 480,),
            'BG_RESTAURANT' =>  fake()->hexColor(),    
            'COULEUR_SITE' =>  fake()->hexColor() 
        ];
    }
}
