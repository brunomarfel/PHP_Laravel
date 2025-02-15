@extends('layout.fe_layout')

@section('content')

<h3>Lista de Presentes</h3>

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
        <td>{{ $gift->spent_value ?? 'Valor não informado' }}</td> 
        <td>{{ $gift->user_name }}</td>
        <td><a href="" class="btn btn-info">Ver</a></td>
        <td><a href="" class="btn btn-danger">Apagar</a></td>
    </tr>
            @endforeach

        </tbody>
    </table>






@endsection





