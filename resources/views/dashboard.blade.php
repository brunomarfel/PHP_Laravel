@extends('layout.fe_layout')

@section('content')


@if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)

{{-- (Auth::user()->user_type == 1) --}}

<div class="alert alert-primary" role="alert">
    Conta de Administrator
</div>

@endif

<h3>Olá, {{ Auth::user()->name}}!</h3>



@endsection



{{-- @if ((Auth::user()->email == 'admin@gmail.com'))

<div class="alert alert-primary" role="alert">
    Conta de Administrator
</div>

@endif --}}











