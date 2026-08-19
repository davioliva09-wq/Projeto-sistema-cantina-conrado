<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="10.css">
</head>

<body>
    <header>
        <img src="logo_cantina.png" alt="cantina"> 
        <h1>Olá, Administrador</h1>
    </header>
    
    <form action="pesquisa"></form>
    <label for="campo-busca">Buscar: </label>
    <input type="search" placeholder="Pesquisar Usuários">
    <button type="submit">Enviar</button>

    <nav>
        <a href="Produtos.html">Produtos</a>
        <a href="Pedidos.html">Pedidos</a>
        <a href="Usuários1.html">Usuários</a>
        <a href="Sair.html">Sair</a>
    </nav>

    <br>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome completo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>cabrito.sila</td>
                <td>email.cabrito.sila</td>
                <td>(11) 99999-9999</td>
                <td>Ativo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>cabrito.sila</td>
                <td>email.cabrito.sila</td>
                <td>(11) 99999-9999</td>
                <td>Ativo</td>
            </tr>
            <tr>
                <td>3</td>
                <td>cabrito.sila</td>
                <td>email.cabrito.sila</td>
                <td>(11) 99999-9999</td>
                <td>Ativo</td>
            </tr>
            <tr>
                <td>4</td>
                <td>cabrito.sila</td>
                <td>email.cabrito.sila</td>
                <td>(11) 99999-9999</td>
                <td>Inativo</td>
            </tr>
        </tbody> 
    </table>
</body>
</html>
