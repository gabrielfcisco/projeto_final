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
        'descricaoCompleta',
        'descricaoCurta',
        'max',
        'min',
        'professor_id',
        'file_path',
        'abertoMatricula',
    ];

    public function alunos(){
        return $this->belongsToMany(Aluno::class);
    }
    
    public function professor(){
        return $this->belongsTo(Professor::class);
    }

}
