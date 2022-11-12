<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Dashboard');
        }
        else{
            return view('Login');
        }
    }

    public function auth(Request $request){
        $remember = isset($request->remember)? true : false;

        if(Auth::attempt(['Usuario' => $request->Usuario, 'Senha' => $request->Senha], $remember)){
            $request->session()->regenerate();
            return redirect()->intended('Dashboard');
        } else{
            return back()->withErrors([
                'Usuario' => 'Não foi encontrado o usuário ou a senha inseridos.',
            ])->onlyInput('Usuario');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
