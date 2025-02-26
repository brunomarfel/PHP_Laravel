@extends('layout.fe_layout')

@section('content')

    <h6>Denominação da Tarefa: {{ $ourTask->name }}</h6>
    {{-- <p>Estado: {{ $ourTask->status }}</p>
    <p>Data de Conclusão: {{ $ourTask->due_at }}</p>
    <p>Responsável: {{ $ourTask->user_name }}</p> --}}


    <form method="POST" action="{{ route('tasks.update') }}">
        @csrf

        <input type="hidden" name="id" value="{{ $ourTask->id }}" id="">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{ $ourTask->name }}">
                @error('name')
                Preencha um nome válido
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descriçao</label>
            <input name="description" type="text" class="form-control" value="{{ $ourTask->description }}">
            @error('description')
            Description Error
            @enderror
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1" class="fw-bold my-2">Data:</label>
        <input type="date" name='due_at' value="{{ $ourTask->due_at }}" class="form-control">
        @error('due_at')
            <div class="invalid-feedback">
                Erro na data
            </div>
        @enderror

        <div class="mb-3 dropdown">
            <label class="form-label">Responsavel da tarefa</label>
            <input name="user_id" type="text" class="form-control" value="{{ $ourTask->user_id }}">
            @error('status')
                Status Error
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>





@endsection
