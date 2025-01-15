<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    use HasFactory;

    protected $fillable = ['id_activity', 'title', 'image_url'];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id_activity', 'id');
    }
}

