@extends('layout.fe_layout')

@section('content')

<h3>Presente: Dia dos Namorados</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome do Presente</th>
                <th>Valor Estimado</th>
                <th>Valor Gasto</th>
                <th>Usuario</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($gifts as $gift)
    <tr>
        <td>{{ $gift->id }}</td>
        <td>{{ $gift->name }}</td>
        <td>{{ $gift->estimated_value }}</td>
        <td>{{ $gift->spent_value}}</td>
        <td>{{ $gift->user_name }}</td>
        <td><a href="{{route('gifts.view',$gift->id)}}" class="btn btn-info">Ver</a></td>
        <td><a href="{{route('gifts.delete',$gift->id)}}" class="btn btn-danger">Apagar</a></td>




    </tr>
            @endforeach

        </tbody>
    </table>

    <hr>

    {{-- <form method="POST" action="{{ route('gifts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="giftName" class="form-label">Nome do Presente</label>
            <input required name="name" type="text" class="form-control" id="giftName">
            @error('name')
                <div class="text-danger">Preencha um nome válido</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="estimatedValue" class="form-label">Valor Estimado</label>
            <input required name="estimated_value" type="number" step="0.01" class="form-control" id="estimatedValue">
            @error('estimated_value')
                <div class="text-danger">Preencha um valor estimado válido</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spentValue" class="form-label">Valor Gasto</label>
            <input name="spent_value" type="number" step="0.01" class="form-control" id="spentValue">
            @error('spent_value')
                <div class="text-danger">Preencha um valor gasto válido</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="userId" class="form-label">Usuário</label>
            <select name="user_id" class="form-control" id="userId" required>
                <option value="">Selecione o Usuário</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">Selecione um usuário válido</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Presente</button>
    </form> --}}






@endsection





