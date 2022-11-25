@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row row-cols-1 row-cols-md-2 g-2">
                        <div class="col">
                        <div class="card h-100">
                            <img src="/Cursos-Online.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cursos Ofertados</h5>
                                <p class="card-text">Aqui você pode ver todos os cursos que são ofertados a você em nossa instituição e realizar sua matrícula.</p>
                                <a href="{{route('cursos.show', Auth::user()->id)}}" class="btn btn-primary">Faça sua matrícula</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/cursos.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cursos Matriculados</h5>
                                <p class="card-text">Aqui você pode ver todos os cursos nos quais você está matriculado, verificar sua nota e também trancar sua matrícula</p>
                                <a href="{{route('cursos.show', Auth::user()->id)}}" class="btn btn-primary">Veja suas disciplinas</a>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
</div>
@endsection
