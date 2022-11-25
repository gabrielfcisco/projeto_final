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
				@if($curso->aberto_matricula == true)
				<td>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Realizar Matrícula
					</button>

					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">{{$curso->nome}}</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
										<div class="modal-body">
										  <p>{{$curso->descricao_completa}}</p>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
										  <button href="{{route('curso.matricula', Auth::user()->aluno->id, $curso->id)}}" type="button" class="btn btn-success">Efetuar Matrícula</button>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
				@else
				<td>
					<a class="btn btn-danger" href="#">Matrículas Encerradas</a>
				</td>
				@endif
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
@endsection