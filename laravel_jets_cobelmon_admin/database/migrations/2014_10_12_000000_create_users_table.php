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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->nullable()->default(null);
            $table->string('email')->unique()->nullable()->default(null);
            $table->string('username_lower')->nullable()->default(null);
            $table->uuid('uuid')->unique()->nullable()->default(null);
            $table->json('data')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default(null);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('rolls')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
