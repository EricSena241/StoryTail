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
        Schema::create('activity_book_user', function (Blueprint $table) {
            $table->bigIncrements('id_activity_book_user');
            $table->foreignId('id_activity_book')->constrained('activity_book', 'id_activity_book');
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->integer('progress');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_book_user');
    }
};
