<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';

    protected $fillable = [
        'tag_name',
    ];

    public function books()
{
    return $this->belongsToMany(Book::class, 'tagging_tagged', 'id_tag', 'id_book');
}

}
