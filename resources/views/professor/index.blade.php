@extends('professor.master')
@section('content')
<h1>{{$professores[0]['Nome']}}</h1>
<a href="{{route('professor.show', $professores[0]['id'])}} "> TESTE</a>

@endsection