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
        Schema::create('user_registers', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->nullable()->default(null);
            $table->string('username_lower')->nullable()->default(null);
            $table->string('email')->unique()->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->foreignId('id_pk_fav')->constrained('pokemon')->onDelete('cascade');
            $table->foreignId('id_pk2_fav')->constrained('pokemon')->onDelete('cascade');
            $table->string('lvl_minecraft')->unique()->nullable()->default(null);
            $table->string('lvl_pokemon')->unique()->nullable()->default(null);
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_registers');
    }
};
