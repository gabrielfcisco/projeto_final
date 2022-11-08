<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {   
        if (Auth::check())
        {
            dd("Autenticado");
        }else{

        return view('login');
        }
    }

    public function auth(Request $request)
    {   

        $remember = isset($request->remember)? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            $request->session()->regenerate();
            return redirect()->intended('welcome');
        } else{
            return back()->withErrors([
                'email' => 'Não foi encontrado o usuário ou a senha inseridos.',
            ])->onlyInput('email');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function teste(){
        dd('OI'); 
    }

    public function teste2(){
        dd('Tudo certo!');
    }

}
