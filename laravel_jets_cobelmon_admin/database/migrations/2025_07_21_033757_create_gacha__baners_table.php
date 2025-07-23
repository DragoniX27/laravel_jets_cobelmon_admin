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
        Schema::create('gacha_banners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del banner
            $table->text('description')->nullable(); // Descripción opcional
            $table->json('pokemons'); // Lista de pokémons y probabilidades
            $table->json('rules')->nullable(); // Reglas como "garantizado shiny en 10 tiros"
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gacha_baners');
    }
};
