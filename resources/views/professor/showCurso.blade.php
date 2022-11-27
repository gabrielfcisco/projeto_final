@extends('professor.masterProfessor')
@section('bolsonaro')
<div class="card-header">{{$curso->nome}}</div>
<div class="card-body">
    <table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Aluno</th>
				<th scope="col">Nota</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
        <tbody>
		@if($alunos->count() > 0)
		@foreach($alunos as $aluno)
		<tr>
			<td>{{$loop->index + 1}}</td>
			<td>{{$aluno->nome}}</td>
			
                <form method="POST" action="{{route('professor.notas',['aluno' => $aluno->id, 'curso' => $curso->id])}}">
                    @csrf
					<td>
                    <input type="number" id="Nota" name="nota" value="{{$coluna_nota[$loop->index]->nota}}">
					</td>
					<td>
                    <button type="submit" class="btn btn-primary">Alterar</button>
					</td>
                </form>
            
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