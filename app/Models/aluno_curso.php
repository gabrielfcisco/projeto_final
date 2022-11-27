<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno_curso extends Model
{
    use HasFactory;

    protected $table = 'aluno_curso';
    protected $fillable = [
        'nota',
    ];
}