@extends('alunos.index')
@section('show')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @yield('show')
                    <div class="col-12 mb-3">
                        <strong>RA: </strong>
                        {{ $aluno->RA }}
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Nome: </strong>
                        {{ $aluno->Nome }}
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Sobrenome: </strong>
                        {{ $aluno->Sobrenome }}
                    </div>
                    <!--<div class="col-12 mb-3">
                        <strong>Filmes: </strong>
                        {{ $aluno->Filmes }}
                    </div>-->
                    <div class="col-12 mb-3">
                        <strong>Matéria: </strong>
                        @if(count($materias) > 0)
                        @foreach($materias as $materia)
                        {{ $materia->Nome }}<br>
                        @endforeach
                        @else
                        <option colspan="4">Record not found!</option>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection