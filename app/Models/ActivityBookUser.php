<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityBookUser extends Model
{
    use HasFactory;

    protected $fillable = ['id_activity_book', 'id_user', 'progress'];

    public function activityBook()
    {
        return $this->belongsTo(ActivityBook::class, 'id_activity_book', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

