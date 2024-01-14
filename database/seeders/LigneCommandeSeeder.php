<?php

namespace Database\Seeders;

use App\Models\LigneCommande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LigneCommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LigneCommande::factory()->count(10)->create();
    }
}
