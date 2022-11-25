<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AlunoController extends Controller
{
    public function index(aluno $aluno)
    {
        $alunos = Aluno::orderBy('nome', 'asc')->paginate(10);
        $id = explode(',', $aluno->id_curso);

        foreach ($id as $i) {
            $cursos = Curso::where('id', '=', $i)->get();
        }

        return view('secretaria.aluno.index', compact('alunos', 'cursos'));
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
            'sobrenome' => 'required',
            'filme' => 'required',
            'CPF' => 'required',
            'materias' => 'required',
        ]);

        aluno::create([
            'email' => $request->RA,
            'nome' => $request->Nome,
            'sobrenome' => $request->Sobrenome,
            'filme' => implode(", ", $request->Filmes),
            'CPF' => $request->CPF,
            'materias' => $request->id_curso,
        ]);

        return redirect()->route('aluno.index')->with('ok', 'aluno cadastrados com sucesso!');
    }

    public function edit(aluno $aluno)
    {
        $aluno = Aluno::find(Auth::user()->id);
        
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
            'email' => Hash::make($request->RA),
            'nome' => $request->Nome,
            'sobrenome' => $request->Sobrenome,
            'filme' => implode(", ", $request->Filmes),
            'CPF' => $request->CPF,
            'materias' => $request->id_curso,
        ]);

        $aluno->update([
            'email' => $request->RA,
            'nome' => $request->Nome,
            'sobrenome' => $request->Sobrenome,
            'filme' => implode(", ", $request->Filmes),
            'CPF' => $request->CPF,
            'materias' => $request->id_curso,
        ]);

        return redirect()->route('aluno.index')->with('ok', 'Aluno atualizado com sucesso!');
    }

    public function destroy(aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('aluno.index')->with('ok', 'aluno removido com sucesso!');
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
            'new_password' => ['required', 'string', 'min:8','confirmed'],
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


           #Match The Old Password
           if(!Hash::check($request->old_password, auth()->user()->password)){
               return back()->with("error", "Old Password Doesn't match!");
           }


           #Update the new Password
            User::whereId(auth()->user()->id)->update([
               'password' => Hash::make($request->new_password)
           ]);

           return back()->with("status", "Password changed successfully!");
        }
        
    public function show (Aluno $aluno){
           $aluno -> cursos()->create([
            'nome'=>'Engenharia do Amor',
            'descricao_completa'=>'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
            'descricao_curta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
            'matriculas' => 0,
            'max'=> 30,
            'min' =>  10,
        ]);

        dd($aluno->cursos);
    }
}
