@extends('secretaria.master')
@section('base')
<div class="card-header">{{ __('Dashboard') }}</div>
<div class="card-body">
    <div class="card-body">
        <div class="card mb-3">
            <img src="/cursos.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Curso</h5>
                <p class="card-text">Aqui você pode ver todos os cursos disponíveis, criar novos, alterar e disponibillizar para matrícula</p>
                <a class="btn btn-outline-dark" href='/secretaria/cursos'>Gerenciar Cursos</a>
            </div>
        </div>
        <div class="card mb-3">
            <img src="/cursos.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Alunos</h5>
                <p class="card-text">Aqui você pode ver todos os alunos disponíveis, criar novos, alterar e realizar suas matrículas</p>
                <a class="btn btn-outline-dark" href="{{route('secretaria.aluno')}}">Gerenciar Alunos</a>
            </div>
        </div>
    </div>
</div>
@endsection