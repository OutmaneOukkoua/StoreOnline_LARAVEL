<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => User::factory(),
            'datecommande' => $this->faker->date(),
            'etat' => "En Cours",
        ];
    }
}
