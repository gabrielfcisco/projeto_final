<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\secretaria;

class SecretariaController extends Controller
{
    public function auth(Request $request)
    {
        return view('secretaria.auth');
    }

    public function show()
    {
        return view('secretaria.index');
    }

    public function login()
    {
        return view('secretaria.login');
    }
}
