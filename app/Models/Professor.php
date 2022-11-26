<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = [
    'Nome',
    'CPF',
    'Ultimo_acesso',
    ];

    protected $casts = [
        'Utlimo_acesso' => 'datetime',
    ];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
