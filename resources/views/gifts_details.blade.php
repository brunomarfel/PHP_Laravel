@extends('layout.fe_layout')

@section('content')

<hr>

<h3>Detalhes: Presentes</h3>

<hr>

<p>ID: {{ $ourGift->id}}</p>
<p>Presente: {{ $ourGift->name}}</p>
<p>Valor Estimado (€): {{ $ourGift->estimated_value}}</p>
<p>Valor Gasto (€): {{$ourGift->spent_value}}</p>
<p>Usuario: {{$ourGift->user_name}}</p>

@endsection
