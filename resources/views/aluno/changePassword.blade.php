@extends('layouts.app')
  
@section('content')

<h1>Mudar Senha</h1>
    <form method="POST" action="{{ route('aluno.update-password') }}">
        @csrf
        @method('PUT')
        <div>
            <label>Senha Anterior</label>
            <input type="password" placeholder="Senha Anterior" name="old_password">
        </div>
        <div>
            <label>Senha Nova</label>
            <input type="password" placeholder="Senha Anterior" name="new_password">
        </div>
        <button>Enviar</button>
    </form>

@endsection