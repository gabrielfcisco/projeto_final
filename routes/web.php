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

//Route::resource('secretaria',SecretariaController::class);
Route::get('/secretaria/login', [SecretariaController::class,'login'])->name('secretaria.login');
Route::get('/teste/login', function(){
    return view('secretaria.login');
});

Route::post('/secretaria/auth',[SecretariaController::class,'auth'])->name('secretaria.auth');
