@extends('layout.fe_layout')

@section('content')

<hr>

<h3>Presente: Dia dos Namorados</h3>

<hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor Estimado (€)</th>
                <th>Valor Gasto (€)</th>
                <th>Usuario</th>
                <th></th> {{-- Espaço em branco --}}
                <th></th> {{-- Espaço em branco --}}
            </tr>
        </thead>

        @foreach($gifts as $gift)

        <tr>
            <td>{{$gift->id}}</td>
            <td>{{$gift->name}}</td>
            <td>{{$gift->estimated_value}}</td>
            <td>{{$gift->spent_value}}</td>
            <td>{{$gift->user_name }}</td>
            <td><a href="{{route('gifts.view',$gift->id)}}" class="btn btn-info">Ver</a></td>
            <td><a href="{{route('gifts.delete',$gift->id)}}" class="btn btn-danger">Apagar</a></td>
        </tr>

        @endforeach

    </table>

    <hr>

    @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <h3>Adicionar Presentes</h3>

    <hr>

    <form method="POST" action="{{route('gifts.create')}}">

        @csrf {{-- obrigatorio --}}

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            @error('name')
            Invalido!
            @enderror
        </div>

        <div class="mb-3">
            <label for="estimated_value" class="form-label">Valor Estimado (€)</label>
            <input required name="estimated_value" type="text" class="form-control" id="estimated_value" aria-describedby="emailHelp">
            @error('estimated_value')
            Invalido!
            @enderror
        </div>

        <div class="mb-3">
            <label for="spent_value" class="form-label">Valor Gasto (€)</label>
            <input required name="spent_value" type="text" class="form-control" id="spent_value" aria-describedby="emailHelp">
            @error('spent_value')
            Invalido!
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuário</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('user_id')
            Invalido!
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

@endsection


