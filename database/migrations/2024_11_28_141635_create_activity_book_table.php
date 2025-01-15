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
        Schema::create('activity_book', function (Blueprint $table) {
            $table->bigIncrements('id_activity_book');
            $table->foreignId('id_activity')->constrained('activities', 'id_activity');
            $table->foreignId('id_book')->constrained('books', 'id_book');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_book');
    }
};
