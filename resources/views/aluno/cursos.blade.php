@extends('layouts.app')

@section('content')
<div class="container">
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@elseif (session('error'))
	<div class="alert alert-danger" role="alert">
		{{ session('error') }}
	</div>
	@endif
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
				<a href="{{route('cursos.matricula', ['aluno' => Auth::user()->aluno->id, 'curso' => $curso->id])}}" class="btn btn-success">
					Realizar Matrícula
				</a>
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