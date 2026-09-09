<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Usuários Cadastrados - Cantina Conrado</title>

    <link rel="stylesheet" href="css/style.css">

    <style>

        .conteudo-usuarios {
            padding: 25px;
        }

        .conteudo-usuarios h1 {
            margin: 0;
            font-size: 30px;
            color: #000000;
        }

        .barra-de-pesquisa {
            display: flex;
            justify-content: flex-start;
            margin-top: 12px;
            margin-bottom: 25px;
        }

        .barra-de-pesquisa form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .barra-de-pesquisa label {
            display: none;
        }

        .barra-de-pesquisa input {
            width: 250px;
            height: 36px;
            padding: 0 12px;
            border: 1px solid #c8c8c8;
            border-radius: 6px;
            box-sizing: border-box;
            outline: none;
        }

        .barra-de-pesquisa input:focus {
            border-color: #999;
        }

        .barra-de-pesquisa button {
            height: 36px;
            padding: 0 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .tabela {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #ffffff;
            border: 1px solid #d5d5d5;
            border-radius: 12px;
            overflow: hidden;
            table-layout: fixed;
        }

        .tabela th {
            background-color: #e9e9e9;
            color: #222;
            text-align: left;
            padding: 15px;
            font-size: 16px;
            border-bottom: 1px solid #d0d0d0;
        }

        .tabela td {
            padding: 15px;
            color: #333;
            border-bottom: 1px solid #e5e5e5;
        }

        .tabela th:nth-child(1),
        .tabela td:nth-child(1) {
            width: 7%;
        }

        .tabela th:nth-child(2),
        .tabela td:nth-child(2) {
            width: 23%;
        }

        .tabela th:nth-child(3),
        .tabela td:nth-child(3) {
            width: 32%;
        }

        .tabela th:nth-child(4),
        .tabela td:nth-child(4) {
            width: 23%;
        }

        .tabela th:nth-child(5),
        .tabela td:nth-child(5) {
            width: 15%;
        }

        .tabela tbody tr:last-child td {
            border-bottom: none;
        }

        .tabela tbody tr:hover {
            background-color: #f7f7f7;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 9px;
            font-weight: bold;
        }


        /* ========================= */
        /* AJUSTE PARA CELULAR */
        /* ========================= */

        @media (max-width: 600px) {

            .conteudo-usuarios {
                padding: 15px;
                box-sizing: border-box;
                width: 100%;
                max-width: 100%;
                overflow: hidden;
            }

            .conteudo-usuarios h1 {
                font-size: 26px;
                margin: 0 0 12px 0;
            }

            .barra-de-pesquisa {
                width: 100%;
                margin-top: 0;
                margin-bottom: 20px;
            }

            .barra-de-pesquisa form {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .barra-de-pesquisa input {
                width: auto;
                flex: 1;
                min-width: 0;
                height: 38px;
            }

            .barra-de-pesquisa button {
                height: 38px;
                padding: 0 15px;
                flex-shrink: 0;
            }

            /*
             Deixa somente a tabela com rolagem
             horizontal quando necessário.
            */

            .tabela {
                width: 100%;
                min-width: 600px;
                table-layout: fixed;
            }

            .tabela th,
            .tabela td {
                padding: 11px 10px;
                font-size: 13px;
                white-space: nowrap;
            }

            .status {
                gap: 6px;
            }

            /*
             Permite mexer a tabela para os lados
             sem aumentar a página inteira.
            */

            .tabela {
                display: table;
            }

            .conteudo-usuarios {
                overflow-x: auto;
            }
        }

    </style>

</head>

<body>

<?php include 'admin-header.php' ?>

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


    <div class="conteudo-usuarios">

        <h1>Usuário</h1>

        <div class="barra-de-pesquisa">

            <form action="" method="get">

                <input
                    type="text"
                    id="campo-busca"
                    placeholder="Pesquisar usuário..."
                    onkeyup="pesquisarUsuario()"
                >

                <button type="submit">Enviar</button>

            </form>

        </div>


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


            <tbody id="lista-usuarios">

                <tr>
                    <td>1</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Inativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Inativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Inativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>9</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Inativo
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>10</td>
                    <td>cabrito.sila</td>
                    <td>cabrito.sila@gmail.com</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <div class="status">
                            Ativo
                        </div>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>


<script>

function pesquisarUsuario() {

    let busca = document
        .getElementById("campo-busca")
        .value
        .toLowerCase();

    let linhas = document.querySelectorAll("#lista-usuarios tr");

    linhas.forEach(function(linha) {

        let texto = linha.textContent.toLowerCase();

        if (texto.includes(busca)) {
            linha.style.display = "";
        } else {
            linha.style.display = "none";
        }

    });

}

</script>


<?php

//include("footer.php")

?>

</body>

</html>