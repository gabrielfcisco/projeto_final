<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao_completa',
        'descricao_curta',
        'max',
        'min',
        'professor_id',
        'aluno_id',
        'file_path',
        'aberto_matricula',
    ];

    public function alunos(){
        return $this->belongsToMany(Aluno::class);
    }
    
    public function professor(){
        return $this->belongsToMany(Professor::class);
    }

}
