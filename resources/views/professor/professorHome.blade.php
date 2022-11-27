@extends('professor.masterProfessor')
@section('bolsonaro')
<div class="card-header">{{ __('Dashboard') }}</div>
<div class="card-body">
    <a type="button" class="btn btn-outline-dark" href={{ route('professor.cursos', Auth::user()->professor->id) }}>Cursos ministrando</a>
</div>
    
@endsection 