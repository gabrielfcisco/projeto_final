<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {   
        if (Auth::check()){

            
            if(Auth::viaRemember())
            {
                dd("Autenticado");
            }else{

            return redirect('logout');
            }
        }
        return view('login');
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function teste(){
        dd('OI'); 
    }

    public function teste2(){
        dd('Tudo certo!');
    }

}
