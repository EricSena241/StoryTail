<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_plan', 'date_start'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'id_plan', 'id');
    }
}

