<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsBook extends Model
{
    use HasFactory;

    protected $table = 'authors_books'; // Nome da tabela no banco de dados

    protected $fillable = [
        'author_id',
        'book_id',
    ];

    /**
     * Relacionamento com o modelo Author.
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id_author');
    }

    /**
     * Relacionamento com o modelo Book.
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id_book');
    }
}
