<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\aluno_curso;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class AlunoController extends Controller
{
    public function index(aluno $aluno)
    {
        $alunos = Aluno::orderBy('nome', 'asc')->paginate(20);
        return view('secretaria.aluno.index', compact('alunos'));
    }

    public function create()
    {
        $filmes = array();

        //$auxcategories =  Http::get('https://www.learn-laravel.cf/categories');
        $categories = json_decode(Http::get('https://learn-laravel.cf/categories'), true);

        for ($j = 1; $j < 7; $j++) {

            //$api = Http::get('https://www.learn-laravel.cf/movies?page=' . $j);
            $api = json_decode(Http::get('https://learn-laravel.cf/movies?page=' . $j), true);

            foreach ($api['data'] as $filme) {
                for ($i = 0; $i < 6; $i++) {
                    if ($filme['category_id'] == $i + 1) {
                        $filmes[] = array(
                            'id' => $filme['id'],
                            'nome' => $filme['name'],
                            'category' => $categories[$i]['name']
                        );
                    }
                }
            }
        }

        $cursos = curso::orderBy('nome', 'asc')->get();

        return view('secretaria.aluno.create', compact('cursos', 'filmes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'nome' => 'required',
            'CPF' => 'required',
            'endereco' => 'required',
            'complemento' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'CEP' => 'required',
            'senha' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'type' => 0,
        ]);

        $user->aluno()->create([
            'nome' => $request->nome,
            'CPF' => $request->CPF,
            'endereco' => $request->endereco,
            'complemento' => $request->complemento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'CEP' => $request->CEP,
            'filme' => $request->filmes,
        ]);

        return back()->with('status', 'Aluno cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $aluno = Aluno::find($id);

        $filmes = array();

        //$auxcategories =  Http::get('https://www.learn-laravel.cf/categories');
        $categories = json_decode(Http::get('https://learn-laravel.cf/categories'), true);

        for ($j = 1; $j < 7; $j++) {

            //$api = Http::get('https://www.learn-laravel.cf/movies?page=' . $j);
            $api = json_decode(Http::get('https://learn-laravel.cf/movies?page=' . $j), true);

            foreach ($api['data'] as $filme) {
                for ($i = 0; $i < 6; $i++) {
                    if ($filme['category_id'] == $i + 1) {
                        $filmes[] = array(
                            'id' => $filme['id'],
                            'nome' => $filme['name'],
                            'category' => $categories[$i]['name']
                        );
                    }
                }
            };
        }

        $cursos = curso::orderBy('nome', 'asc')->get();

        return view('secretaria.aluno.edit', compact('aluno', 'cursos', 'filmes'));
    }

    public function update(Request $request, aluno $aluno)
    {   

        $request->validate([
            'email' => 'required',
            'nome' => 'required',
            'CPF' => 'required',
            'endereco' => 'required',
            'complemento' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'CEP' => 'required',
        ]);

        $aluno->user()->update([
            'email' => $request->email,
        ]);

        $aluno->update([
            'nome' => $request->nome,
            'CPF' => $request->CPF,
            'endereco' => $request->endereco,
            'complemento' => $request->complemento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'CEP' => $request->CEP,
            'filme' => $request->filmes,
        ]);

        return back()->with('status', 'Aluno atualizado com sucesso!');
    }

    public function destroy(aluno $aluno)
    {   
        $aluno->user()->delete();
        $aluno->delete();
        return redirect()->route('aluno.index')->with('status', 'Aluno removido com sucesso!');
    }

    public function changePassword()
    {
        return view('aluno.changePassword');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Senha Anterior não está correta!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Senha alterada com sucesso!");
    }

    public function show(User $user)
    {
        $cursos = Curso::all();
        foreach ($cursos as $curso) {
            if ($curso->matriculas >= $curso->max) {
                $curso->update([
                    'abertoMatricula' => false,
                ]);
            }
        }
        return view('aluno.cursos', compact('cursos'));
    }

    public function matricula(Aluno $aluno, Curso $curso)
    {
        $cursos = $aluno->cursos;
        foreach ($cursos as $c) {
            if ($c->id == $curso->id) {
                return back()->with("error", "Você já está matriculado no curso");
            }
        }
        $aluno->cursos()->attach($curso->id);
        $aluno->cursos()->increment('matriculas');

        return back()->with("status", "Matrícula realizada com sucesso!");
    }

    public function cursosMatriculados(Aluno $aluno)
    {
        $cursos = $aluno->cursos;

        foreach ($cursos as $curso) {
            $s = aluno_curso::where('aluno_id', $aluno->id)->where('curso_id', $curso->id)->first();
            $curso['nota'] = $s->nota;
        }

        return view('aluno.cursosMatriculados', compact('cursos'));
    }

    public function desmatricula(Aluno $aluno, Curso $curso)
    {

        $aluno->cursos()->decrement('matriculas');
        $aluno->cursos()->detach($curso->id);
        return back()->with("status", "Matrícula encerrada com sucesso!");
    }
}
