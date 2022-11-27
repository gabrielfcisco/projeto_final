@extends('secretaria.master')
@section('base')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar {{$curso->nome}}</h3>
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
		<form class="row g-3" method="POST" action="{{route('secretaria.editCurso', $curso->id)}}">
			@csrf
			<div class="col-12">
				<label for="Nome" class="form-label">Nome do Curso</label>
				<input type="text" class="form-control" id="Nome" name="nome" value="{{$curso->nome}}">
			</div>
			<div class="col-12">
				<label for="Descricao_curta" class="form-label">Descrição Curta</label>
				<input type="text" class="form-control" id="Descricao_curta" name="descricao_curta" value="{{$curso->descricaoCurta}}">
			</div>
			<div class="col-12">
				<label for="Descricao_completa" class="form-label">Descrição Completa</label>
				<input type="text" class="form-control" id="Descricao_completa" name="descricao_completa" value="{{$curso->descricaoCompleta}}">
			</div>
            <div class="col-12">
				<label for="Maximo" class="form-label">Máximo de Alunos</label>
				<input type="number" class="form-control" id="Max" name="max" value="{{$curso->max}}">
			</div>
            <div class="col-12">
				<label for="Minimo" class="form-label">Mínimo de Alunos</label>
				<input type="number" class="form-control" id="Min" name="min" value="{{$curso->min}}">
			</div>

			<div class="col-6">
			    <button type="submit" class="btn btn-primary">Enviar</button>
			</div>
            <div class="col-6">
			    <a href="{{route('secretaria.delCurso', $curso->id)}}" class="btn btn-danger">Deletar Curso</a>
			</div>
		</form>
		<div class="row">
			<div class="col-12">
				<table class="table">
					<th>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
							<th scope="col">Ação</th>
						</tr>
					</th>
					<tbody>
						@if($alunos->count() > 0)
						@foreach($alunos as $aluno)
						<tr>
							<td>{{$loop->index + 1}}</td>
							<td>{{$aluno->nome}}</td>
							<td>{{$aluno->user->email}}</td>
							<td>
								<form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
									<a class="btn btn-success" href="{{ route('cursos.matricula', ['aluno' => $aluno->id, 'curso' => $curso->id]) }}">Editar</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Excluir</button>
								</form>
							</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="4">Dados não encontrados!</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
</div>
</div>
@endsection