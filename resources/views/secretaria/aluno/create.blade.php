@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Inserir Aluno</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('aluno.index')}}">Voltar</a>
	</div>
</div>
@if($errors->any())
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Um erro ocorreu!</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<form method="POST" action="{{route('aluno.store')}}">
			@csrf
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="email">
			</div>
			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
			</div>
			<div class="mb-3">
				<label for="CPF" class="form-label">CPF</label>
				<input type="text" class="form-control" id="CPF" name="CPF" placeholder="CPF">
			</div>
			<div class="mb-3">
				<label for="Filmes" class="form-label">Filmes</label><br>
				<select class="filme" name="filmes[]" multiple="multiple" id="filmes">
					@if(count($filmes) > 0)
					@foreach($filmes as $filme)
					<option value="{{ $filme['nome'] }}">{{ $filme['nome'] }}</option>
					@endforeach
					@else
					<option colspan="4">Filme não inserido!</option>
					@endif
				</select>
				<script>
					$(document).ready(function() {
						$('.filme').select2();
					});
				</script>
			</div>
			<div class="mb-3">
				<label for="id_materia" class="form-label">Matérias</label><br>
				<select name="id_materia" class="id_materia" id="id_materia">
					@if($cursos->count() > 0)
					@foreach($cursos as $materia)
					<option value="{{ $materia['id'] }}">{{ $materia['nome'] }}</option>
					@endforeach
					@else
					<option colspan="4">Matéria não inserida!</option>
					@endif
				</select>
				<script>
					$(document).ready(function() {
						$('.id_materia').select2();
					});
				</script>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>

</div>
@endsection