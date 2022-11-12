<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admin';

    protected $fillable=[
        'Nome',
        'Usuario',
        'Senha',
        'admin',
    ];

    protected $hidden=[
        'Senha',
        'remember_token'
    ];

    protected $casts=[
        'Ultimo_acesso' => "datetime",
    ];

}
