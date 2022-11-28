@extends('secretaria.master')
@section('base')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Adicionar Curso</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route(Auth::user()->type. '.home')}}">Voltar</a>
	</div>
</div>
<div class="card-body">
	@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@elseif (session('error'))
		<div class="alert alert-danger" role="alert">
			{{ session('error') }}
		</div>
	@endif
		<form class="row g-3" method="POST" action="{{route('secretaria.adicionarCurso')}}">
			@csrf
			<div class="col-12">
				<label for="Nome" class="form-label">Nome do Curso</label>
				<input type="text" class="form-control" id="Nome" name="nome" placeholder="Dê um nome ao curso">
			</div>
			<div class="col-12">
				<label for="Descricao_curta" class="form-label">Descrição Curta</label>
				<input type="text" class="form-control" id="Descricao_curta" name="descricao_curta" placeholder="Descreva brevemente o curso">
			</div>
			<div class="col-12">
				<label for="Descricao_completa" class="form-label">Descrição Completa</label>
				<input type="text" class="form-control" id="Descricao_completa" name="descricao_completa" placeholder="Descreva o curso">
			</div>
            <div class="col-12">
				<label for="Maximo" class="form-label">Máximo de Alunos</label>
				<input type="number" class="form-control" id="Max" name="max" placeholder="Quantidade máxima de alunos no curso">
			</div>
            <div class="col-12">
				<label for="Minimo" class="form-label">Mínimo de Alunos</label>
				<input type="number" class="form-control" id="Min" name="min" placeholder="Quantidade mínima de alunos para o curso prosseguir">
			</div>

			<div class="col-12">
			    <button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>
</div>
</div>
@endsection