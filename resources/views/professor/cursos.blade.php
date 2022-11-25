@extends('professor.professorHome')
@section('bolsonaro')
    @if (count(Auth::user()->professor->curso)>0)
        @foreach (Auth::user()->professor->curso as $curso)
            <p>{{$curso->nome}}</p>
        @endforeach
    @endif
    
@endsection