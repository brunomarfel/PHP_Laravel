@extends('layout.fe_layout')

@section('content')

    <h3>Olá, Bruno</h3>

    <hr>

    <img src="{{asset('img/ImagemGoogle.jpg')}}" alt="" width="300" height="200">

    <hr>

    <h6>{{$myVar}}</h6>
    <hr>
    <h6>Olá {{$myName}}</h6>
    <hr>
    <h6>A lista de comprsa tem {{$shoppingList[2]}}</h6>
    <ul>
        @foreach ($shoppingList as $item)
        <li>O item é: {{$item}}</li>
        @endforeach
    </ul>
    <hr>
    <h6>O nome é {{$contactInfo['name']}} e o contato é {{$contactInfo['email']}}</h6>
    <hr>
    <h6> {{$cesaeInfo['name']}}</h6>
    <hr>

    <ul>
        <li><a href="{{ route('users.all') }}">Todos os usuários</a></li>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello</a></li>
        <li><a href="{{ route('users.newusers') }}">Adicionar usuários</a></li>
        <li><a href="{{ route('task') }}">Todas as Tarefas</a></li>
        <li><a href="{{ route('tasks.all') }}">Adicionar Tarefas</a></li>
        <li><a href="{{ route('gifts') }}">Presente</a></li>
    </ul>


@endsection
