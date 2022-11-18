<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function login(){
        return view('alunos.login');
    }


    public function matricula(){
        return view('matricula.matricula');
    }
}

