<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\UserController;
use App\Models\alunos;
use Illuminate\Support\Facades\Route;

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

//Route::get('login', [AlunosController::class, 'login'])->name('alunos.login');

//Route::put('login/authenticate', [AlunosController::class, 'authenticate'])->name('alunos.authenticate');

//Route::resource('alunos', AlunosController::class);

//Route::resource('professores', ProfessoresController::class);

//Route::resource('materias', MateriasController::class);

Route::get('/login', [UserController::class, 'index'])->name('login.home');

Route::post('/login/auth', [UserController::class, 'auth'])->name('user.login');

Route::get('/welcome', function(){
  return view('welcome');
})->middleware('admin');

Route::get('/admin', [UserController::class, 'teste'])->middleware('admin');

Route::get('/secretaria', [UserController::class, 'teste2'])->middleware('secretaria');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
