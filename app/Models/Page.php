<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['id_book', 'page_image_url', 'audio_url', 'page_index'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }
}

