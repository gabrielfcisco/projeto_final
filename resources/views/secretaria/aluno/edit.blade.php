@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar Aluno</h3>
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
		<form method="POST" action="{{route('aluno.update', $aluno->id)}}">
			@csrf
			@method('PUT')
			<div class="mb-3">
			    <label for="RA" class="form-label">RA</label>
			    <input type="text" class="form-control" id="RA" name="RA" value="{{$aluno->email}}">
		  	</div>
			<div class="mb-3">
			    <label for="Nome" class="form-label">Nome</label>
			    <input type="text" class="form-control" id="Nome" name="Nome" value="{{$aluno->nome}}">
		  	</div>
		  	<div class="mb-3">
			    <label for="Sobrenome" class="form-label">Sobrenome</label>
			    <input type="text" class="form-control" id="Sobrenome" name="Sobrenome" value="{{$aluno->CPF}}">
		  	</div>
			<div class="mb-3">
				<label for="Filmes" class="form-label">Filmes</label><br>
				<select class="filmes" name="Filmes[]" multiple="multiple" id="Filmes" value="{{$aluno->filmes}}">
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
						$('.filmes').select2();
					});
				</script>
			</div>
			<div class="mb-3">
				<label for="id_materia" class="form-label">Matérias</label><br>
				<select name="id_materia" class="id_materia" id="id_materia">
					@if($curso->count() > 0)
					@foreach($curso as $materia)
					<option value="{{ $materia['id'] }}">{{ $materia['Nome'] }}</option>
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