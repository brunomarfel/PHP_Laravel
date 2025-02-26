<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

{{--Passos: Formulário, campos obrigatórios, POST, action, @csrf --}}

@extends('layout.fe_layout')
@section('content')

@if(session('message'))
    <div class="alert alert-success">
            {{session('message')}}
    </div>
    @endif

    <h2>Aqui pode adicionar novos usuarios</h2>

<form method="POST" action="{{ route('users.create') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
            @error('name')
            Preencha um nome válido
            @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
            @error('email')
            Preencha um email válido
            @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
            Preencha uma palavra-passe válida
            @enderror
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>


@endsection

</body>
</html>


