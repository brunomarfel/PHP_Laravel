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

@endsection
