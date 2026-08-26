<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="css/style.css">
    <style> 
    .meno a {
    display: block;
    width: 100%;
    padding: 12px 0;        
    text-decoration: none;
    color: white;          
    text-align: left;       
    padding-left: 10px;     
    box-sizing: border-box;
}
         Sair{
            margin-left: 145px;
         }
        body {
    background-color: #d3d3d3;
}

       .tabela {
            margin-left: 145px;
            max-width: calc(100% - 145px);
            }
        .meno {
    position: fixed;
    left: 0;
    top: 120px;
    width: 145px;
    height: 100vh;
    background-color: #010226;
    display: flex;
    flex-direction: column;
}
    .barra-de-pesquisa{
        margin-left: 145px;
        max-width: calc(100% - 145px);

    }
    </style>
</head>

<body>
<?php include 'header.php'; ?>
    
    <div class="barra-de-pesquisa">
    <form action="pesquisa"></form>
    <label for="campo-busca">Buscar: </label>
    <input type="Usuário" placeholder="Pesquisar Usuários">
    <button type="submit">Enviar</button>
    </div>

    <nav class=meno>
        <a href="Produtos.html">Produtos</a>
        <a href="Pedidos.html">Pedidos</a>
        <a href="Usuários1.html">Usuários</a>
        <a href="Sair.html" margin-bottom: 30px; >Sair</a>
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
