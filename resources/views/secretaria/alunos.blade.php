@extends('secretaria.master')
@section('base')
<div class="card-header">{{ __('Gerenciar Alunos') }}</div>
<div class="row">
<div class="col-12 col-md-2 text-end">
    <a class="btn btn-primary" href="{{route(Auth::user()->type. '.home')}}">Voltar</a>
</div>
</div>
<div class="card-body">
    <div class="list-group">
        <a href="{{ route('aluno.create') }}" class="list-group-item list-group-item-action" >Criar Aluno</a>
        <a href="{{ route('aluno.index') }}" class="list-group-item list-group-item-action" >Visualizar todos os alunos</a>
        <a href="{{ route('aluno.insert') }}" class="list-group-item list-group-item-action">Inserir Aluno em Curso</a>
    </div>
</div>
@endsection