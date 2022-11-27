<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SecretariaController extends Controller
{
    public function secretariaCursos(){
        $cursos = Curso::all();
        return view('secretaria.cursos', compact('cursos'));
    }

    public function abrirMatricula($id){
        $curso = Curso::find($id);

        if($curso->aberto_matricula == 1){
            Curso::where('id', $id)->update([
                'aberto_matricula' => 0,
            ]);
        }
        if($curso->aberto_matricula == 0){
            Curso::where('id', $id)->update([
                'aberto_matricula' => 1,
            ]);
        }
        return back();
    }

    public function showAlunos(){
        return view('secretaria.alunos');
    }
}
