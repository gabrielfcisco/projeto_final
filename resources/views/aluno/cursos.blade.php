@extends('layouts.app')
  
@section('content')
<div class="container">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Curso</th>
            <th scope="col">Descrição Curta</th>
            <th scope="col">Descrição Completa</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    @if($cursos->count() > 0)
				@foreach($cursos as $curso)
				<tr>
					<td>{{$loop->index + 1}}</td>
					<td>{{$curso->nome}}</td>
					<td>{{$curso->descricao_completa}}</td>
					<td>{{$curso->descricao_curta}}</td>
					@if($curso->status == true)
					<td>
						<form action="{{ route('curso.destroy', $curso->id) }}" method="POST">
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
													{{ $curso->email }}
												</div>
												<div class="col-12 mb-3">
													<strong>Nome: </strong>
													{{ $curso->nome }}
												</div>
												<div class="col-12 mb-3">
													<strong>CPF: </strong>
													{{ $curso->CPF }}
												</div>
												<div class="col-12 mb-3">
													<strong>Filmes: </strong>
													{{ $curso->filmes }}
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
							<a class="btn btn-primary" href="{{ route('curso.edit', $curso->id) }}">Editar</a>
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
</div>
@endsection