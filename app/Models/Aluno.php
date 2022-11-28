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
        'endereco',
        'cidade',
        'CEP',
        'estado',
        'complemento',
        'user_id',
        'materias',
    ];
    protected $with = ['user'];

    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
