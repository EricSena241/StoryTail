<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_name', 'access_level'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'id_plan', 'id');
    }
}
