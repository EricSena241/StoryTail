<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    // Define a chave primária correta
    protected $primaryKey = 'id_activity';

    // Indica que a chave primária é auto-incrementável
    public $incrementing = true;

    // Define o tipo da chave primária
    protected $keyType = 'int';

    protected $fillable = ['title', 'activity_description'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'activity_book', 'id_activity', 'id_book');
    }
}