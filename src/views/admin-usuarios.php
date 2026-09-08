<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="css/style.css">
    <style> 
   
    </style>
</head>

<body>
<?php include 'header.php'; ?>

    <div id="wrapper">

    <aside id="sidebar">
            <nav>
                <a href="admin-dashboard.php">Dashboard</a>
                <a href="admin-pedidos.php">Pedidos</a>
                <a href="admin-estoque.php">Estoque</a>
                <a href="admin-relatorio.php">Relatórios</a>
                <a href="admin-usuarios.php" class="ativo">Usuários</a>
           </nav>
       </aside>

    <div class="barra-de-pesquisa">
    <form action="pesquisa"></form>
    <label for="campo-busca">Buscar: </label>
    <input type="Usuário" placeholder="Pesquisar Usuários">
    <button type="submit">Enviar</button>
    </div>


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
<?php
//include("footer.php")
?></body>
</html>
