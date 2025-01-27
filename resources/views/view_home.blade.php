<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

@php 
$myVar ='hello world'
@endphp


<body>

    <h1>Olá, estou em casa!</h1>
    <h6>Teste {{ $myVar }} </h6>

    <ul>
        <li><a href="{{ route('users.all') }}">Todos os users</a></li>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello</a></li>
        <li><a href="{{ route('newusers') }}">Adicionar usuários</a></li>
        

        
    </ul>
    
</body>
</html>