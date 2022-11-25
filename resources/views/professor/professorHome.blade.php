@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    <a type="button" class="btn btn-outline-dark" href={{ route('professor.showCursos', Auth::user()->professor->id) }}>Cursos ministrando</a>
                    @yield('bolsonaro')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection