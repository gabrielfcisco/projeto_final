@extends('professor.masterProfessor')
@section('bolsonaro')
<div class="card-header">{{ __('Cursos Ministrando') }}</div>
<div class="card-body">
    @foreach ($cursos as $curso)
        <a href="{{ route('professor.showCurso', ['professor'=> Auth::user()->professor->id ,'curso' => $curso->id]) }}">{{$curso->nome}}</a><br>
    @endforeach
</div>
@endsection