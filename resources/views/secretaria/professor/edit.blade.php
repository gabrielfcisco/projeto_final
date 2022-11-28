@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar Professor</h3>
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


		<form class="row g-3" method="POST" action="{{route('professor.updating', $professor->id)}}">
			@csrf
			@method('PUT')
			<div class="col-12">
				<label for="Email" class="form-label">Email</label>
				<input type="text" class="form-control" id="Email" name="email" value="{{$professor->user->email}}">
			</div>
			<div class="col-12">
				<label for="Nome" class="form-label">Nome</label>
				<input type="text" class="form-control" id="Nome" name="nome" value="{{$professor->Nome}}">
			</div>
			<div class="col-12">
				<label for="CPF" class="form-label">CPF</label>
				<input type="text" class="form-control" id="CPF" name="CPF" value="{{$professor->CPF}}">
			</div>
			<div class="col-12">
				<label for="inputEndereco" class="form-label">Endereço</label>
				<input type="text" class="form-control" id="Endereco" name="endereco" value="{{$professor->endereco}}">
			  </div>
			  <div class="col-12">
				<label for="inputComplemento" class="form-label">Complemento</label>
				<input type="text" class="form-control" id="Complemento" name="complemento" value="{{$professor->complemento}}">
			  </div>
			  <div class="col-md-6">
				<label for="inputCidade" class="form-label">Cidade</label>
				<input type="text" class="form-control" id="Cidade" name="cidade" value="{{$professor->cidade}}">
			  </div>
			  <div class="col-md-4">
				<label for="inputEstado" class="form-label">Estado</label>
				<select id="Estado" name="estado" class="form-select" value="{{$professor->estado}}">
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
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                    <option selected>{{$professor->estado}}</option>
				</select>
			  </div>
			<div class="col-md-2">
				<label for="inputCEP" class="form-label">CEP</label>
				<input type="text" class="form-control" id="CEP" name="CEP" value="{{$professor->CEP}}">
			  </div>
			<div class="col-12">
			<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>

</div>
</div>
@endsection