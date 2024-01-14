<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_commande');
            $table->foreign('id_commande')->references('id')->on('commandes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codeproduit');
            $table->foreign('codeproduit')->references('codeproduit')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedSmallInteger('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
