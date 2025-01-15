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
        Schema::create('tagging_tagged', function (Blueprint $table) {
            $table->bigIncrements('id_tagging_tagged');
            $table->foreignId('id_book')->constrained('books', 'id_book');
            $table->foreignId('id_tag')->constrained('tag', 'id_tag');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagging_tagged');
    }
};
