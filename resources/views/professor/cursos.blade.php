@extends('professor.masterProfessor')
@section('bolsonaro')
<div class="card-header">{{ __('Cursos Ministrando') }}</div>
<div class="row">
<div class="col-12 col-md-2 text-end">
    <a class="btn btn-primary" href="{{route(Auth::user()->type. '.home')}}">Voltar</a>
</div>
</div>
<div class="card-body">
    <div class="list-group">
    @foreach ($cursos as $curso)
        <a href="{{ route('professor.showCurso', ['professor'=> Auth::user()->professor->id ,'curso' => $curso->id]) }}" class="list-group-item list-group-item-action" >{{$curso->nome}}</a><br>
    @endforeach
</div>
@endsection