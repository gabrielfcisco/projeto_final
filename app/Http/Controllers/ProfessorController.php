<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\aluno_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function index(){

        $professores = Professor::orderBy('Nome', 'asc')->paginate(10);

        return view('professor.index', compact('professores'));
    }

    public function show(Professor $professor){
        $professor -> cursos()->create([
            'nome'=>'Engenharia Agrícola',
            'descricao_completa'=>'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
            'descricao_curta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
            'matriculas' => 0,
            'max'=> 30,
            'min' =>  10,
        ]);

        dd($professor->cursos);

        return view('professor.index', compact('professores'));
    }

    public function showCursos(Professor $professor){
        $cursos = Curso::where('professor_id', '=', Auth::user()->professor->id)->get();
        return view('professor.cursos', compact('professor', 'cursos'));
    }

    public function showCurso(Professor $professor, $curso_id){
        $curso = Curso::find($curso_id);
        $alunos = $curso->alunos;
        $coluna_nota = aluno_curso::where('curso_id', '=', $curso_id)->get();
        return view('professor.showCurso', compact('alunos', 'curso', 'coluna_nota'));
    }

    public function atribuirNota(Request $request ,Aluno $aluno, Curso $curso){
        $request->validate([
            'nota' => 'required',
        ]);

        aluno_curso::where('aluno_id', $aluno->id)->where('curso_id', $curso->id)->update([
            'nota' => $request->nota,
        ]);
        return back();
    }

}
