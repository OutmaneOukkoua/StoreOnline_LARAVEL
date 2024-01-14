<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;


class LigneCommandeFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'id_commande' => Commande::factory(),
            'codeproduit' => Produit::factory(),
            'quantite' => $this->faker->numberBetween(1,10)
        ];
    }
}
