
@extends('layout.fe_layout')

@section('content')

<h1>Listagem de Tarefas</h1>

<hr>

<ul>
    @foreach ($tasksList as $subtasks)
    <li>{{$subtasks['name']}} : {{$subtasks['task']}}</li>
    @endforeach

</ul>

<hr>

<ul>
    @foreach ($avaliableTasks as $subtasks)

    <li>{{$subtasks}}</li>

    @endforeach

</ul>

<h3>Tarefas vindas da DB</h3>

<table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Nome</th>
        <th scope="col">Status</th>
        <th scope="col">Descricao</th>
        <th scope="col">User</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        </tbody>
        <tbody>
            @foreach ($tasksFromDB as $tasks )
                <tr>
                    <th scope="row">{{ $tasks->id }}</th>
                    <td>{{ $tasks->name}}</td>
                    <td>{{ $tasks->status }}</td>
                    <td>{{ $tasks->description }}</td>
                    <td>{{ $tasks->user_name }}</td>
                    <td><a href="{{route('task.view',$tasks->id)}}" class="btn btn-info">Ver/Editar</a></td>
                    <td><a href="{{route('task.delete',$tasks->id)}}" class="btn btn-danger">Apagar</a></td>

                </tr>
            @endforeach

    </table>


    @if(session('message'))
    <div class="alert alert-sucess">
        {{session('message')}}
    </div>
    @endif


    <hr>


    <h3>Formulário de Tarefa</h3>

    <form method="POST" action="{{ route('task.create') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                @error('name')
                Coloque um nome válido!
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
                <select name="user_id" id="">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>

                @error('user_id')
                Coloque um utilizador válido!
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>

@endsection





















