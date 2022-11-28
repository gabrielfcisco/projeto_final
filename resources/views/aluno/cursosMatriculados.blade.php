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
				<th scope="col">Capa</th>
				<th scope="col">Nome do Curso</th>
				<th scope="col">Descrição Curta</th>
				<th scope="col">Nota</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		@if($cursos->count() > 0)
		@foreach($cursos as $curso)
		<tr>
			<td>{{$loop->index + 1}}</td>
			<td><img src="{{$curso->file_path}}" class="img-thumbnail" alt="..." style="width:5vw"></td>
			<td>{{$curso->nome}}</td>
			<td>{{$curso->descricaoCurta}}</td>
			<td>{{$curso->nota}}</td>
			<td>
				<a class="btn btn-danger" href="{{route('cursos.desmatricula', ['aluno' => Auth::user()->aluno->id, 'curso' => $curso->id])}}">Encerrar Matrícula</a>
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
@endsection