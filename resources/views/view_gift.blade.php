<!-- resources/views/view_gift.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendas</title>
</head>
<body>
    <h1>Lista de Prendas</h1>

    <table>
        <thead>
            <tr>
                <th>Nome da Prenda</th>
                <th>Valor Previsto</th>
                <th>Valor Gasto</th>
                <th>Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
<tr>
    <td>{{$gift->id}}</td>
    <td>{{$gift->name}}</td>
    <td>{{$gift->estimated_value}}</td>
</tr>
@endforeach
        </tbody>
    </table>
</body>
</html>
