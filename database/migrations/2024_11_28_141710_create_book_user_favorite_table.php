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
        Schema::create('book_user_favorite', function (Blueprint $table) {
            $table->bigIncrements('id_book_user_favorite');
            $table->foreignId('id_book')->constrained('books', 'id_book');
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user_favorite');
    }
};