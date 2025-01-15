<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    use HasFactory;

    // Especifica a tabela associada
    protected $table = 'age_groups';

    // Define o nome da chave primária
    protected $primaryKey = 'id_agegroup';

    // Define se a chave primária é auto-incrementável
    public $incrementing = true;

    // Define o tipo da chave primária
    protected $keyType = 'int';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'age_range', // Por exemplo, "3-5 anos"
    ];
}
