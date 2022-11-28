@extends('secretaria.master')
@section('base')
<div class="container">
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Inserir Aluno no Curso</h3>
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
		<form class="row g-3" method="POST" action="{{route('alunoincurso')}}">
			@csrf
            @method('POST')
			<div class="col-12">
				<label for="Nome" class="form-label">Nome do Curso</label>
				<select class="form-select" name="curso" id="curso" placeholder="Selecione...">
					@if(count($cursos) > 0)
					@foreach($cursos as $curso)
					<option value="{{ $curso->id }}">{{ $curso->nome }}</option>
					@endforeach
					@else
					<option colspan="4">Cursos não encontrados!</option>
					@endif
				</select>
			</div>
			<div class="col-12">
				<label for="Descricao_curta" class="form-label">Descrição Curta</label>
                <select class="form-select" name="aluno" id="aluno" placeholder="Selecione...">
					@if(count($alunos) > 0)
					@foreach($alunos as $aluno)
					<option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
					@endforeach
					@else
					<option colspan="4">Alunos não encontrados!</option>
					@endif
				</select>
			</div>
			
			<div class="col-6">
			    <button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>
</div>
</div>
@endsection