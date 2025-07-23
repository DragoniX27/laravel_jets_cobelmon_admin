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
        Schema::create('pokemon_captures', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->index();
            $table->string('species');
            $table->string('species_id')->nullable();
            $table->boolean('shiny')->default(false);
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->string('original_trainer_uuid')->index();
            $table->boolean('is_legendary')->default(false);
            $table->string('form')->nullable();
            $table->string('captured_ball');
            $table->json('types');
            $table->integer('level')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('in_team')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_captures');
    }
};
