<?php

use App\Http\Controllers\SecretariaController;
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

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< Updated upstream
=======

Route::get('/loginProfessor', function () {
    return view('loginProfessor');
});

Route::resource('secretaria',SecretariaController::class);
Route::get('/',[SecretariaController::class,'login'])->name('login');
Route::post('/auth',[SecretariaController::class,'auth'])->name('auth.secretaria');
>>>>>>> Stashed changes
