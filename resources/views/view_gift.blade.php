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
    <div class="alert alert-sucess">
        {{session('message')}}
    </div>
    @endif

    <h3>Adicionar Presentes</h3>

    <hr>

    <form method="POST" action="{{ route('gifts.create') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            @error('name')<div class="text-danger">Invalido!</div>@enderror
        </div>

        <div class="mb-3">
            <label for="estimated_value" class="form-label">Valor Estimado (€)</label>
            <input required name="estimated_value" type="text" class="form-control" id="estimated_value" aria-describedby="emailHelp">
            @error('estimated_value')<div class="text-danger">Invalido!</div>@enderror
        </div>

        <div class="mb-3">
            <label for="spent_value" class="form-label">Valor Gasto (€)</label>
            <input required name="spent_value" type="text" class="form-control" id="spent_value" aria-describedby="emailHelp">
            @error('spent_value')<div class="text-danger">Invalido!</div>@enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuário</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')<div class="text-danger">Invalido!</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    {{-- <form>
        <fieldset disabled>
          <legend>Disabled fieldset example</legend>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Disabled input</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Disabled select menu</label>
            <select id="disabledSelect" class="form-select">
              <option>Disabled select</option>
            </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
              <label class="form-check-label" for="disabledFieldsetCheck">
                Can't check this
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
      </form> --}}

@endsection
