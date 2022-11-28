<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\aluno_curso;
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

    public function adicionarCurso_page(){
        return view('secretaria.adicionarCurso');
    }

    public function adicionarCurso(Request $request){
        $request->validate([
            'nome' => 'required',
            'descricao_curta' => 'required',
            'descricao_completa' => 'required',
            'max' => 'required',
            'min' => 'required',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'descricaoCompleta' => $request->descricao_completa,
            'descricaoCurta' => $request->descricao_curta,
            'max' => $request->max,
            'min' => $request->min,
        ]);

        $cursos = Curso::all();
        return view('secretaria.cursos', compact('cursos'));
    }

    public function editCurso_page($curso_id){
        $curso = Curso::find($curso_id);
        $alunos = $curso->alunos;

        $registros = 0;
        $soma_notas = 0;
        $reprovados = 0;
        $aprovados = 0;
        $notas = aluno_curso::all();
        foreach($notas as $nota){
            $soma_notas += $nota->nota;
            $registros += 1;
            if($nota->nota >= 5){
                $aprovados += 1;
            }else{
                $reprovados += 1;
            }
        }
        $nota = $soma_notas / $registros;

        foreach ($alunos as $aluno) {
            $s = aluno_curso::where('aluno_id', $aluno->id)->where('curso_id', $curso->id)->first();
            $aluno['nota'] = $s->nota;
        }
        $professores = Professor::all();
  
        return view('secretaria.editCurso', compact('curso', 'alunos', 'professores', 'nota', 'aprovados', 'reprovados'));
    }

    public function editCurso(Request $request, $curso_id){
        $request->validate([
            'nome' => 'required',
            'descricao_curta' => 'required',
            'descricao_completa' => 'required',
            'max' => 'required',
            'min' => 'required',
        ]);

        $curso = Curso::where('id', $curso_id)->update([
            'nome' => $request->nome,
            'descricaoCompleta' => $request->descricao_completa,
            'descricaoCurta' => $request->descricao_curta,
            'max' => $request->max,
            'min' => $request->min,
            'professor_id' => $request->professor,
        ]);

        $cursos = Curso::all();
        return view('secretaria.cursos', compact('cursos'));
    }

    public function delCurso($curso_id){
        Curso::where('id', $curso_id)->delete();

        $cursos = Curso::all();
        return view('secretaria.cursos', compact('cursos'));
    }
//     /*------------------------------------------
//     --------------------------------------------
//     CRUD Alunos
//     --------------------------------------------
//     --------------------------------------------*/
//     public function index(aluno $aluno)
//     {
//         $alunos = Aluno::orderBy('Nome', 'asc')->paginate(10);
//         $id = explode(',', $aluno->id_curso);

    public function showAlunos(){
        return view('secretaria.alunos');
    }
    public function showProfessores(){
        return view('secretaria.professores');
    }
}
