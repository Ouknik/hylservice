<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reprises', function (Blueprint $table) {
            $table->id();
            $table->string('marque', 100);
            $table->string('modele', 100);
            $table->integer('annee');
            $table->integer('kilometrage');
            $table->string('carburant', 30);
            $table->string('etat', 30);
            $table->text('commentaires')->nullable();
            $table->string('nom', 100);
            $table->string('email', 100);
            $table->string('telephone', 20);
            $table->string('ville', 100)->nullable();
            $table->string('status', 20)->default('En attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reprises');
    }
};
