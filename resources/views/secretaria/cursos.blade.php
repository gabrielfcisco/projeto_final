@extends('secretaria.master')
@section('base')
<div class="card-header">
<div class="row g-3">
	<div class="col-6">
		{{__('Cursos Disponiveis')}}
	</div>
	<div class="col-6">
		<p class="text-end">
		<a class="btn btn-primary" href="/secretaria/cursos/adicionar">Adicionar Curso</a>
		</p>
	</div>
</div>
</div>

<div class="card-body">
    <table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Descrição</th>
				<th scope="col">Abrir/Fechar Matrícula</th>
			</tr>
		</thead>
        <tbody>
		@if($cursos->count() > 0)
		@foreach($cursos as $curso)
		<tr>
			<td>{{$loop->index + 1}}</td>
			<td><a href={{ route('secretaria.editCurso_page', $curso->id) }} class="btn btn-outline-dark">{{$curso->nome}}</a></td>
            <td>{{$curso->descricaoCompleta}}</td>
			<td>
                @if ($curso->aberto_matricula == 0)
                    <a class="btn btn-danger" href={{ route('secretaria.matricula', $curso->id) }}>Fechado</a>
                @else
                    <a class="btn btn-success" href={{ route('secretaria.matricula', $curso->id) }}>Aberto</a>
                @endif
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