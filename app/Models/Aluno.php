<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'CPF',
        'filme',
        'ultimoAcesso',
        'materias',
    ];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }


}
