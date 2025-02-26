<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layout.fe_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif

<h3>Olá, aqui vai ter todos os usuários sem ser da Base de Dados.</h3>
<hr>
<h3>Olá {{$myName}}</h3>
<hr>
<ul>
    @foreach ($allUsers as $user)
       <li>{{ $user['id'] }} - {{ $user['name'] }} : {{ $user['email'] }}</li>
    @endforeach
 </ul>

 <h3>Users vindos da BD</h3>

 <hr>


 <form action="">
    <input type="text" name="search" value="{{ request()->query('search') }}" id="">
    <button type="submit" class="btn btn-secondary">Procurar</button>
</form>

<hr>

 <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Morada</th>
                <th scope="col"></th>  {{-- Espaço para botão --}}
                <th scope="col"></th>  {{-- Espaço para botão --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td><a href="{{route('users.view',$user->id)}}" class="btn btn-info">Ver/Editar</a></td>
                    <td><a href="{{route('users.delete', $user->id)}}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach

    </table>


@endsection


</body>
</html>
