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
			<div class="col-12">
				<label for="inputEndereco" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="Endereco" name="endereco" placeholder="Endereço">
			  </div>
			  <div class="col-12">
				<label for="inputComplemento" class="form-label">Complemento</label>
				<input type="text" class="form-control" id="Complemento" name="complemento" placeholder="Complemento">
			  </div>
			  <div class="col-md-6">
				<label for="inputCidade" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="Cidade" name="cidade" placeholder="Cidade">
			  </div>
			  <div class="col-md-4">
				<label for="inputEstado" class="form-label">Estado</label>
				<select id="Estado" name="estado" class="form-select" placeholder="Selecione...">
					<option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP" selected>São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
				</select>
			  </div>
			  <div class="col-md-2">
				<label for="inputCEP" class="form-label">CEP</label>
				<input type="text" class="form-control" id="CEP" name="CEP" placeholder="CEP">
			  </div>
			<div class="col-md-6">
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