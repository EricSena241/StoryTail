<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUserFavorite extends Model
{
    use HasFactory;

    protected $fillable = ['id_book', 'id_user'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
