<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_author'; // Define a chave primária personalizada
    protected $fillable = ['first_name', 'last_name', 'author_description', 'author_photo_url', 'nationality'];


    public function books()
    {
        return $this->belongsToMany(Book::class, 'authors_books', 'author_id', 'book_id')
                    ->withTimestamps(); // Caso queira armazenar created_at e updated_at na tabela pivot
    }
}