@extends('layout.fe_layout')

@section('content')

<form method="POST" action="{{ route('password.email') }}">
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
    <button type="submit" class="btn btn-primary">Recuperar</button>
</form>



@endsection
