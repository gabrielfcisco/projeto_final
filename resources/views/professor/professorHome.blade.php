@extends('professor.masterProfessor')
@section('bolsonaro')
<div class="card-header">
    {{ __('Dashboard') }}
</div>
<div class="card-body">
    <div class="card mb-3">
        <img src="/cursos.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Cursos Ministrando</h5>
                <p class="card-text">Aqui você pode ver todos os cursos que você está ministrando, verificar e alterar as notas</p>
                <a class="btn btn-outline-dark" href={{ route('professor.cursos', Auth::user()->professor->id) }}>Cursos ministrando</a>
            </div>
      </div>
</div>
    
@endsection 