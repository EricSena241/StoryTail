<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Nome da tabela
    protected $table = 'users';

    // Chave primária personalizada
    protected $primaryKey = 'id_user';

    // Certifique-se de que a chave não seja incremental automática (se aplicável)
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Campos preenchíveis
    protected $fillable = [
        'id_usertype',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'user_photo_url',
    ];

    // Campos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
