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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->integer('pokedex_number')->nullable();
            $table->string('species');
            $table->json('forms')->nullable();
            $table->boolean('is_legendary')->default(false);
            $table->json('sprites')->nullable();
            $table->json('types')->nullable();
            $table->integer('generation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
