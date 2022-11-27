@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar Aluno</h3>
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
		<form class="row g-3" method="POST" action="{{route('aluno.updating', Auth::user()->id)}}">
			@csrf
			@method('PUT')
			<div class="col-12">
				<label for="Email" class="form-label">Email</label>
				<input type="text" class="form-control" id="Email" name="email" value="{{$aluno->user->email}}">
			</div>
			<div class="col-12">
				<label for="Nome" class="form-label">Nome</label>
				<input type="text" class="form-control" id="Nome" name="nome" value="{{$aluno->nome}}">
			</div>
			<div class="col-12">
				<label for="CPF" class="form-label">CPF</label>
				<input type="text" class="form-control" id="CPF" name="CPF" value="{{$aluno->CPF}}">
			</div>
			<div class="col-12">
				<label for="inputEndereco" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="Endereco" name="endereco" value="{{$aluno->endereco}}">
			  </div>
			  <div class="col-12">
				<label for="inputComplemento" class="form-label">Complemento</label>
				<input type="text" class="form-control" id="Complemento" name="complemento" value="{{$aluno->complemento}}">
			  </div>
			  <div class="col-md-6">
				<label for="inputCidade" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="Cidade" name="cidade" value="{{$aluno->cidade}}">
			  </div>
			  <div class="col-md-4">
				<label for="inputEstado" class="form-label">Estado</label>
				<select id="Estado" name="estado" class="form-select" value="{{$aluno->estado}}">
				  <option selected>{{$aluno->estado}}</option>
				  <option>...</option>
				</select>
			  </div>
			  <div class="col-md-2">
				<label for="inputCEP" class="form-label">CEP</label>
				<input type="text" class="form-control" id="CEP" name="CEP" value="{{$aluno->CEP}}">
			  </div>
			<div class="col-md-6">
				<label for="Filmes" class="form-label">Filmes</label><br>
				<select class="form-select" name="filmes" multiple="multiple" id="Filmes" value="{{$aluno->filmes}}">
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
			<div class="col-12">
			<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>

</div>
</div>
@endsection