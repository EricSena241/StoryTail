<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityBook extends Model
{
    use HasFactory;

    protected $fillable = ['id_activity', 'id_book'];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id_activity', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }
}

