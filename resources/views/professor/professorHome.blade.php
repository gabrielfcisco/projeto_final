@extends('professor.masterProfessor')
@section('bolsonaro')
    <a type="button" class="btn btn-outline-dark" href={{ route('professor.cursos', Auth::user()->professor->id) }}>Cursos ministrando</a>
@endsection 