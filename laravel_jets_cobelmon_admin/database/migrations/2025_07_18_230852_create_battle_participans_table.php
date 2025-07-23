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
        Schema::create('battle_participans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id')->constrained('battles')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('is_winner')->default(false);
            $table->boolean('is_npc')->default(false);
            $table->string('npc_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battle_participans');
    }
};
