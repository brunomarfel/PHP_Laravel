@extends('layout.fe_layout')

@section('content')

<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        @error('email')
            erro email
        @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
        @error('password')
            erro password
        @enderror
        <a href="{{route('password.request')}}">Esqueci Palavra-Passe</a>
    </div>
    <button type="submit" class="btn btn-primary">Inserir</button>
</form>
@endsection
