<?php

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
Route::middleware(['auth', 'user-access:aluno'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:administrador'])->group(function () {
  
    Route::get('/administrador/home', [HomeController::class, 'administradorHome'])->name('administrador.home');
});
  
/*------------------------------------------
--------------------------------------------
All Secretary Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:secretaria'])->group(function () {
  
    Route::get('/secretaria/home', [HomeController::class, 'secretariaHome'])->name('secretaria.home');
});
