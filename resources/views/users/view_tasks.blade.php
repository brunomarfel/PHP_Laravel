@extends('layout.fe_layout')

@section('content')

    <h6>Denominação da Tarefa: {{ $ourTask->name }}</h6>
    <p>Estado: {{ $ourTask->status }}</p>
    <p>Data de Conclusão: {{ $ourTask->due_at }}</p>
    <p>Responsável: {{ $ourTask->user_name }}</p>

@endsection
