@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Alunos</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route(Auth::user()->type. '.home')}}">Voltar</a>
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
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->index + 1}}">
								Detalhes
							</button>

							<div class="modal fade" id="exampleModal{{$loop->index + 1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-12 mb-3">
													<strong>Nome: </strong>
													{{ $aluno->nome }}
												</div>
												<div class="col-12 mb-3">
													<strong>Email: </strong>
													{{ $aluno->user->email }}
												</div>
												<div class="col-12 mb-3">
													<strong>CPF: </strong>
													{{ $aluno->CPF }}
												</div>
												<div class="col-12 mb-3">
													<strong>Endereço: </strong>
													{{ $aluno->endereco }}, {{$aluno->complemento}} - {{$aluno->cidade}}, {{$aluno->estado}}
												</div>
												<div class="col-12 mb-3">
													<strong>CEP: </strong>
													{{ $aluno->CEP }}
												</div>
												<div class="col-12 mb-3">
													<strong>Filme: </strong>
													{{ $aluno->filme }}
												</div>
												<div class="col-12 mb-3">
													<strong>Matéria: </strong>
													@if(count($aluno->cursos) > 0)
														@foreach($aluno->cursos as $materia)
															{{ $materia->nome }}<br>
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
							<a class="btn btn-success" href="{{ route('aluno.edit', $aluno->id) }}">Editar</a>
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
		{!! $alunos->links() !!}
	</div>
</div>
</div>
@endsection