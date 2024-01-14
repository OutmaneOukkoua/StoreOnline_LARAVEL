<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        $imagePath = $this->faker->image('public/storage/images', 400, 300, null, false);
        $image = Storage::url($imagePath);

        return [
            'codeproduit' => $this->faker->unique()->ean8(),
            'description' => $this->faker->sentence,
            'image' => $image,
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'id_categorie' => Categorie::factory(),
        ];
    }
}
