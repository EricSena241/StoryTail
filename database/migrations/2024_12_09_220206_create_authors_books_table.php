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
        Schema::create('authors_books', function (Blueprint $table) {
            $table->bigIncrements('id_authors_books'); // ID único da tabela
            $table->unsignedBigInteger('author_id');   // Relaciona com a tabela authors
            $table->unsignedBigInteger('book_id');     // Relaciona com a tabela books

            // Chaves estrangeiras
            $table->foreign('author_id')->references('id_author')->on('authors')->onDelete('cascade');
            $table->foreign('book_id')->references('id_book')->on('books')->onDelete('cascade');

            // Evitar duplicatas
            $table->unique(['author_id', 'book_id']); // Um par único de autor e livro

            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_books');
    }
};
