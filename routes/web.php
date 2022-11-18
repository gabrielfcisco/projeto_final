<?php

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
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:aluno'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-acess:professor'])->group(function () {
  
    Route::get('/professor/home', [HomeController::class, 'professorHome'])->name('professor.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:administrador'])->group(function () {
  
    Route::get('/administrador/home', [HomeController::class, 'administradorHome'])->name('administrador.home');
});
  
/*------------------------------------------
--------------------------------------------
All Secretary Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-acess:secretaria'])->group(function () {
  
    Route::get('/secretaria/home', [HomeController::class, 'secretariaHome'])->name('secretaria.home');
});
