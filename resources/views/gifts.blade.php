
@extends('layouts.app')

@section('content')
    <h1>Gestão de Prendas</h1>

    <!-- Formulário para adicionar uma nova prenda -->
    <section>
        <h2>Adicionar Nova Prenda</h2>
        <form action="{{ route('gifts.store') }}" method="POST">
            @csrf
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="valor_previsto">Valor Previsto</label>
                <input type="number" name="valor_previsto" id="valor_previsto" step="0.01" required>
            </div>

            <div>
                <label for="valor_gasto">Valor Gasto</label>
                <input type="number" name="valor_gasto" id="valor_gasto" step="0.01" required>
            </div>

            <div>
                <label for="user_id">Usuário</label>
                <select name="user_id" id="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Salvar</button>
        </form>
    </section>

    <!-- Tabela de prendas -->
    <section>
        <h2>Lista de Prendas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor Previsto</th>
                    <th>Valor Gasto</th>
                    <th>Usuário</th>
                    <th>Diferença</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gifts as $gift)
                    <tr>
                        <td>{{ $gift->nome }}</td>
                        <td>{{ number_format($gift->valor_previsto, 2, ',', '.') }} €</td>
                        <td>{{ number_format($gift->valor_gasto, 2, ',', '.') }} €</td>
                        <td>{{ $gift->user->name }}</td>
                        <td>{{ number_format($gift->valor_previsto - $gift->valor_gasto, 2, ',', '.') }} €</td>
                        <td>
                            <!-- Visualizar Detalhes -->
                            <button type="button" class="show-details-btn" data-id="{{ $gift->id }}">Ver Detalhes</button>
                            <!-- Apagar -->
                            <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Exibição dos Detalhes (inicialmente oculto) -->
    <section id="gift-details" style="display:none;">
        <h2>Detalhes da Prenda</h2>
        <div id="details-content">
            <!-- Detalhes serão carregados via JS -->
        </div>
        <button id="close-details-btn">Fechar</button>
    </section>

    <script>
        // Exibir detalhes da prenda
        document.querySelectorAll('.show-details-btn').forEach(button => {
            button.addEventListener('click', function() {
                const giftId = this.getAttribute('data-id');

                // Enviar uma requisição para obter os detalhes da prenda
                fetch(`/gifts/${giftId}`)
                    .then(response => response.json())
                    .then(data => {
                        const detailsContent = document.getElementById('details-content');
                        detailsContent.innerHTML = `
                            <p><strong>Nome:</strong> ${data.nome}</p>
                            <p><strong>Valor Previsto:</strong> €${data.valor_previsto}</p>
                            <p><strong>Valor Gasto:</strong> €${data.valor_gasto}</p>
                            <p><strong>Usuário:</strong> ${data.user.name}</p>
                            <p><strong>Diferença:</strong> €${(data.valor_previsto - data.valor_gasto).toFixed(2)}</p>
                        `;
                        document.getElementById('gift-details').style.display = 'block';
                    })
                    .catch(error => console.log(error));
            });
        });

        // Fechar a exibição dos detalhes
        document.getElementById('close-details-btn').addEventListener('click', function() {
            document.getElementById('gift-details').style.display = 'none';
        });
    </script>
@endsection
