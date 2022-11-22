<?php

namespace App\Http\Controllers;

use App\Models\professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function index(){
        if(Auth::check()){
            return  view('welcome');
        }
        return view('professores.login');
    }

    public function auth(Request $request){
        $remember = isset($request->remember)? true : false;

        if(Auth::attempt(['Usuario' => $request->Usuario,
                          'Senha'   => $request->Senha], $remember)){
            $request->session()->regenerate();
            return redirect()->intended('Welcome');
        } else{
            return back()->withErrors([
                'Usuario' => 'Não foi encontrado o usuário ou a senha inseridos.',
            ])->onlyInput('Usuario');
        }
    }

    public function logout(){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('professores.login');
    }
}
