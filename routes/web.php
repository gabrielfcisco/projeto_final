<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
Lista de Rotas de Alunos
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:aluno'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('aluno.home');
    Route::get('/', function () {
        return view('welcome');
    })->name('aluno.cadastro');
    Route::get('/aluno/{id}/edit', [AlunoController::class, 'edit']);
    Route::get('/change-password', [AlunoController::class, 'changePassword'])->name('change-password');
    Route::post('/update-password', [AlunoController::class, 'updatePassword'])->name('update-password');
    Route::get('/aluno/cursos/{id}', [AlunoController::class, 'show'])->name('cursos.show');
    Route::get('/aluno/{aluno}/matriculas', [AlunoController::class, 'cursosMatriculados'])->name('cursos.matriculados');
    Route::get('/matricula/{aluno}/{curso}', [AlunoController::class, 'matricula'])->name('cursos.matricula');
});

/*------------------------------------------
--------------------------------------------
Lista de Rotas de Professores
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-acess:professor'])->group(function () {
  
    Route::get('/professor/home', [HomeController::class, 'professorHome'])->name('professor.home');
    Route::get('/professor/{id}/cursos', [ProfessorController::class, 'showCursos'])->name('professor.cursos');
    Route::get('/professor/{professor}/cursos/{curso}', [ProfessorController::class, 'showCurso'])->name('professor.showCurso');
    Route::post('professor/{aluno}/{curso}', [ProfessorController::class, 'atribuirNota'])->name('professor.notas'); 
    Route::get('/', function(){
        return view('welcome');
    })->name('professor.cadastro');
    // Route::get('/professor/{id}/edit', [ProfessorController::class, 'edit'])->name('professor.edit');
    // Route::get('/change-password', [ProfessorController::class, 'changePassword'])->name('change-password');, 
});
  
/*------------------------------------------
--------------------------------------------
Lista de Rotas de Administrador
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:administrador'])->group(function () {
  
    Route::get('/administrador/home', [HomeController::class, 'administradorHome'])->name('administrador.home');
});
  
/*------------------------------------------
--------------------------------------------
Lista de Rotas de Secretária
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:secretaria'])->group(function () {
  
    Route::get('/secretaria/home', [HomeController::class, 'secretariaHome'])->name('secretaria.home');
    Route::resources([
        'aluno' => AlunoController::class,
        'professor' => ProfessorController::class,
        'curso' => CursoController::class,
    ]);
});

