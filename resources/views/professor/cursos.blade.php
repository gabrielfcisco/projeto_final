@extends('professor.masterProfessor')
@section('bolsonaro')
    @foreach ($cursos as $curso)
        <a href="{{ route('professor.showCurso', ['professor'=> Auth::user()->professor->id ,'curso' => $curso->id]) }}">{{$curso->nome}}</a><br>
    @endforeach
@endsection