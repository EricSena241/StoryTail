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
            $table->bigIncrements('id_user');
            $table->foreignId('id_usertype')->constrained('user_types', 'id_usertype');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('username', 30)->unique();
            $table->string('email', 255)->unique();
            $table->string('password'); // Alterado para "password"
            $table->string('user_photo_url', 255)->nullable();
            $table->rememberToken(); // Adiciona suporte a "remember me"
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
