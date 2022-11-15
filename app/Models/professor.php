<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    use HasFactory;
    protected $table = 'professores';

    protected $fillable=[
        'Nome',
        'Usuario',
        'Senha',
    ];

    protected $hidden=[
        'Senha',
        'remember_token'
    ];

    protected $casts=[
        'Ultimo_acesso' => "datetime",
    ];
}
