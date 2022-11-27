@extends('secretaria.master')
@section('base')
<div class="card-header">{{__('Cursos Disponiveis')}}<a class="btn btn-primary" href="#">Adicionar Curso</a></div>
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
			<td>{{$curso->nome}}</td>
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