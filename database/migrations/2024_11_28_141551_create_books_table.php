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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id_book'); // Chave primária personalizada
            $table->string('title', 60);
            $table->string('book_description', 1000)->nullable();
            $table->string('cover_url', 255)->nullable();
            $table->string('video_url', 255)->nullable();
            $table->string('book_url', 255)->nullable();
            $table->integer('read_time');
            $table->foreignId('age_group') // Foreign key para 'age_groups'
                ->constrained('age_groups', 'id_agegroup')
                ->onDelete('cascade');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
