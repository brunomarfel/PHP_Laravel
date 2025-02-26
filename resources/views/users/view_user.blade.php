@extends('layout.fe_layout')


@section('content')

    <h6>Utilizador: {{ $ourUser->name }}</h6>
    {{-- <p>Nome:{{ $ourUser->name }}</p>
    <p>Morada: {{ $ourUser->address }}</p>
    <p>NIF: {{ $ourUser->nif }}</p> --}}

    <form method="POST" action="{{ route('users.update') }}">
        @csrf

        <input type="hidden" name="id" value="{{ $ourUser->id }}" id="">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{ $ourUser->name }}">
                @error('name')
                Preencha um nome válido
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Morada</label>
            <input name="address" type="text" class="form-control" value="{{ $ourUser->address }}">
            @error('address')
                erro morada
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">NIF</label>
            <input name="nif" type="text" class="form-control" value="{{ $ourUser->nif }}">
            @error('nif')
                erro nif
            @enderror
        </div>




        <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>



@endsection
