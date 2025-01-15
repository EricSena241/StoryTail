<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Especifica a tabela associada
    protected $table = 'books';

    // Define o nome da chave primária
    protected $primaryKey = 'id_book';

    // Define se a chave primária é auto-incrementável
    public $incrementing = true;

    // Define o tipo da chave primária
    protected $keyType = 'int';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'book_description',
        'cover_url',
        'video_url',
        'book_url',
        'read_time',
        'age_group',
        'is_active',
    ];

    // Relacionamento com a tabela AgeGroup
    public function ageGroup()
    {
        return $this->belongsTo(AgeGroup::class, 'age_group', 'id_agegroup');
    }


    // Relacionamento com a tabela Pages
    public function pages()
    {
        return $this->hasMany(Page::class, 'id_book', 'id_book');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'authors_books', 'book_id', 'author_id')
                    ->withTimestamps(); // Caso queira armazenar created_at e updated_at na tabela pivot
    }
    public function activities()
{
    return $this->belongsToMany(Activity::class, 'activity_book', 'id_book', 'id_activity');
}

}
