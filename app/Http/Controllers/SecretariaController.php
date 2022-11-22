<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SecretariaController extends Controller
{
    /*------------------------------------------
    --------------------------------------------
    CRUD Alunos
    --------------------------------------------
    --------------------------------------------*/
    public function index(aluno $aluno)
    {
        $alunos = Aluno::orderBy('Nome', 'asc')->paginate(10);
        $id = explode(',', $aluno->id_curso);

        foreach($id as $i)
        {
            $cursos = Curso::where('id', '=', $i)->get();
        }

        return view('alunos.index', compact('alunos', 'cursos'));
    }

    public function create()
    {   
        $filmes = array();

        //$auxcategories =  Http::get('https://www.learn-laravel.cf/categories');
        $categories = Http::get('https://www.learn-laravel.cf/categories')->body();
        dd($categories);

        for($j=1; $j<7; $j++) {

            //$api = Http::get('https://www.learn-laravel.cf/movies?page=' . $j);
            $api = json_decode(Http::get('https://www.learn-laravel.cf/movies?page=' . $j), true);
            
            foreach ($api['data'] as $filme){
                for($i=0 ; $i<6; $i++){
                    if($filme['category_id'] == $i+1){
                        $filmes = array(
                            'id' => $filme['id'], 
                            'nome' => $filme['name'],
                            'category' => $categories[$i]['name']);
                    }
                }
            }
        } 

        $cursos = curso::orderBy('Nome', 'asc')->get();

        return view('alunos.create', compact('cursos', 'filmes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'RA' => 'required',
            'Nome' => 'required',
            'Sobrenome' => 'required',
            'Filmes' => 'required',
            'id_curso' => 'required',
        ]);

        aluno::create([
            'RA' => $request->RA,
            'Nome' => $request->Nome,
            'Sobrenome' => $request->Sobrenome,
            'Filmes' => implode(", ", $request->Filmes),
            'id_curso' => $request->id_curso,
        ]);

        return redirect()->route('aluno.index')->with('ok', 'aluno cadastrados com sucesso!');
    }
    
    public function edit(aluno $aluno)
    {
        $filmes = array();

        //$auxcategories =  Http::get('https://www.learn-laravel.cf/categories');
        $categories = json_decode(Http::get('https://www.learn-laravel.cf/categories'), true);

        for($j=1; $j<7; $j++) {

            //$api = Http::get('https://www.learn-laravel.cf/movies?page=' . $j);
            $api = json_decode(Http::get('https://www.learn-laravel.cf/movies?page=' . $j), true);
            
            foreach ($api['data'] as $filme){
                for($i=0 ; $i<6; $i++){
                    if($filme['category_id'] == $i+1){
                        $filmes = array(
                            'id' => $filme['id'], 
                            'nome' => $filme['name'],
                            'category' => $categories[$i]['name']);
                    }
                }
            };
        } 

        $cursos = curso::orderBy('Nome', 'asc')->get();

        return view('aluno.edit', compact('aluno', 'cursos', 'filmes'));
    }

    public function update(Request $request, aluno $aluno)
    {
        $request->validate([
            'RA' => 'required',
            'Nome' => 'required',
            'Sobrenome' => 'required',
            'Filmes' => 'required',
            'id_curso' => 'required',
        ]);

        $aluno->update([
            'RA' => $request->RA,
            'Nome' => $request->Nome,
            'Sobrenome' => $request->Sobrenome,
            'Filmes' => implode(", ", $request->Filmes),
            'id_curso' => $request->id_curso,
        ]);

        return redirect()->route('aluno.index')->with('ok', 'Aluno atualizado com sucesso!');
    }

    public function destroy(aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('aluno.index')->with('ok', 'aluno removido com sucesso!');
    }
}
