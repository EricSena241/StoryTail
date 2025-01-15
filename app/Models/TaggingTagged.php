<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaggingTagged extends Model
{
    use HasFactory;

    protected $fillable = ['id_book', 'id_tag'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag', 'id');
    }
}

