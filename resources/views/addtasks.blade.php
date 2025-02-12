@extends('layout.fe_layout')

@section('content')

<h1>Formulário de Tarefa</h1>

    <form method="POST" action="{{ route('users.create') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                @error('name')
                Coloque um nome válida!
                @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input required name="description" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                @error('description')
                Coloque uma tarefa válida!
                @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Utilizador</label>
            <input required name="user" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                @error('user')
                Coloque um utilizador válifo!
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>

@endsection
