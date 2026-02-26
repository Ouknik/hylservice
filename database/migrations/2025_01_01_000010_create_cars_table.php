<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marque', 100);
            $table->string('modele', 100);
            $table->integer('annee');
            $table->decimal('prix', 12, 2);
            $table->integer('kilometrage')->default(0);
            $table->string('carburant', 30);
            $table->string('transmission', 30);
            $table->string('couleur', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('vendeur_nom', 100);
            $table->string('vendeur_email', 100);
            $table->string('vendeur_telephone', 20);
            $table->string('vendeur_ville', 100)->nullable();
            $table->string('status', 20)->default('En attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
