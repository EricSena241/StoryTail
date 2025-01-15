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
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id_author');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('author_description', 1000)->nullable();
            $table->string('author_photo_url', 255)->nullable();
            $table->string('nationality', 255);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
