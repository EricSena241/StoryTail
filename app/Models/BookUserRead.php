<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUserRead extends Model
{
    use HasFactory;

    // Nome exato da tabela
    protected $table = 'book_user_read';

    // Chave primária personalizada
    protected $primaryKey = 'id_book_user_read';

    // Indica que a chave primária é auto-incrementável
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    protected $fillable = ['id_book', 'id_user', 'progress', 'rating', 'read_date'];

    protected static function boot()
    {
        parent::boot();

        // Define um valor padrão para a coluna progress
        static::creating(function ($model) {
            if (is_null($model->progress)) {
                $model->progress = 0; // Valor fixo
            }
        });
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id_book');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}