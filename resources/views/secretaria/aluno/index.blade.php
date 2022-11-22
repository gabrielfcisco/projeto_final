@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Alunos</h3>
	</div>
	<div class="btn-group" role="group" aria-label="Basic example">
		<a class="btn btn-primary" href="/" role="button">Início</a>
		<a class="btn btn-primary" href="{{route('aluno.create')}}" role="button">Inserir Aluno</a>
	</div>
</div>
@if($message = Session::get('error'))
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>{{$message}}!</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<table class="table table-primary">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Email</th>
					<th scope="col">Nome</th>
					<th scope="col">CPF</th>
					<th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
				@if($alunos->count() > 0)
				@foreach($alunos as $aluno)
				<tr>
					<td>{{$loop->index + 1}}</td>
					<td>{{$aluno->email}}</td>
					<td>{{$aluno->nome}}</td>
					<td>{{$aluno->CPF}}</td>
					<td>
						<form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Detalhes
							</button>

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-12 mb-3">
													<strong>Email: </strong>
													{{ $aluno->email }}
												</div>
												<div class="col-12 mb-3">
													<strong>Nome: </strong>
													{{ $aluno->nome }}
												</div>
												<div class="col-12 mb-3">
													<strong>CPF: </strong>
													{{ $aluno->CPF }}
												</div>
												<div class="col-12 mb-3">
													<strong>Filmes: </strong>
													{{ $aluno->filmes }}
												</div>
												<div class="col-12 mb-3">
													<strong>Matéria: </strong>
													@if(count($cursos) > 0)
														@foreach($cursos as $materia)
															{{ $materia->Nome }}<br>
														@endforeach
													@else
													<option colspan="4">Record not found!</option>
													@endif
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
							<a class="btn btn-primary" href="{{ route('aluno.edit', $aluno->id) }}">Editar</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Excluir</button>
						</form>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="4">Record not found!</td>
				</tr>
				@endif
			</tbody>
		</table>
		{!! $alunos->links() !!}
	</div>
</div>
@endsection