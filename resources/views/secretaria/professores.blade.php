@extends('secretaria.master')
@section('base')
<div class="card-header">{{ __('Gerenciar Professores') }}</div>
<div class="row">
<div class="col-12 col-md-2 text-end">
    <a class="btn btn-primary" href="{{route(Auth::user()->type. '.home')}}">Voltar</a>
</div>
</div>
<div class="card-body">
    <div class="list-group">
        <a href="{{ route('professor.create') }}" class="list-group-item list-group-item-action" >Criar Professor</a>
        <a href="{{ route('professor.index') }}" class="list-group-item list-group-item-action" >Visualizar todos os professores</a>
</div>
@endsection