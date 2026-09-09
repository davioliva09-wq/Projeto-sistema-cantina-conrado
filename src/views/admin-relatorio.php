<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Relatórios - Cantina Conrado</title>

    <link rel="stylesheet" href="css/style.css">

    <style>

        main {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            box-sizing: border-box;
        }

        section {
            margin-bottom: 30px;
        }

        /* FILTROS */

        .filtros {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .filtros div {
            display: flex;
            flex-direction: column;
        }

        .filtros label {
            margin-bottom: 5px;
        }

        .filtros input {
            height: 36px;
            box-sizing: border-box;
        }

        .filtros button {
            height: 36px;
            padding: 0 15px;
            cursor: pointer;
        }


        /* RESUMO */

        .resumo {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #333;
            padding: 15px;
            min-width: 180px;
            box-sizing: border-box;
        }


        /* GRÁFICO */

        .grafico {
            display: flex;
            align-items: end;
            justify-content: center;
            gap: 25px;
            height: 250px;
            padding: 20px;
            border-bottom: 2px solid #333;
            box-sizing: border-box;
        }

        .barra-produto {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            height: 100%;
        }

        .barra {
            width: 50px;
            background-color: #444;
        }

        .barra-1 {
            height: 100px;
        }

        .barra-2 {
            height: 160px;
        }

        .barra-3 {
            height: 130px;
        }

        .barra-4 {
            height: 200px;
        }


        /* TABELA */

        .tabela-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }


        /* ========================= */
        /* AJUSTE PARA CELULAR */
        /* ========================= */

        @media (max-width: 768px) {

            /* Esconde a barra lateral no celular */

            #sidebar {
                display: none;
            }


            /* Conteúdo ocupa a tela */

            main {
                width: 100%;
                max-width: none;
                margin: 20px 0;
                padding: 0 15px;
                box-sizing: border-box;
            }


            /* Títulos */

            main h1 {
                font-size: 26px;
                line-height: 1.2;
            }

            main h2 {
                font-size: 21px;
            }

            main h3 {
                font-size: 17px;
            }


            /* Texto */

            main p {
                font-size: 15px;
            }


            /* FILTROS */

            .filtros {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                width: 100%;
            }

            .filtros div {
                width: 100%;
            }

            .filtros label {
                font-size: 14px;
                margin-bottom: 5px;
            }

            .filtros input {
                width: 100%;
                height: 40px;
            }

            .filtros button {
                width: 100%;
                height: 40px;
            }


            /* CARDS */

            .resumo {
                display: flex;
                flex-direction: column;
                gap: 12px;
                width: 100%;
            }

            .card {
                width: 100%;
                min-width: 0;
                padding: 15px;
            }


            /* GRÁFICO */

            .grafico {
                width: 100%;
                height: 260px;
                padding: 15px 5px;
                gap: 10px;
                justify-content: space-around;
                overflow: hidden;
            }

            .barra-produto {
                width: 22%;
                min-width: 0;
            }

            .barra {
                width: 30px;
                max-width: 100%;
            }

            .barra-produto span {
                font-size: 12px;
                text-align: center;
                word-break: break-word;
            }

            .barra-1 {
                height: 80px;
            }

            .barra-2 {
                height: 120px;
            }

            .barra-3 {
                height: 100px;
            }

            .barra-4 {
                height: 150px;
            }


            /* TABELA */

            .tabela-container {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            table {
                width: 100%;
                min-width: 450px;
            }

            th,
            td {
                padding: 9px;
                font-size: 14px;
            }

        }


        /* CELULARES PEQUENOS */

        @media (max-width: 400px) {

            main {
                padding: 0 10px;
            }

            main h1 {
                font-size: 23px;
            }

            main h2 {
                font-size: 19px;
            }

            .grafico {
                height: 230px;
                gap: 5px;
            }

            .barra {
                width: 25px;
            }

            .barra-1 {
                height: 70px;
            }

            .barra-2 {
                height: 105px;
            }

            .barra-3 {
                height: 90px;
            }

            .barra-4 {
                height: 130px;
            }

            .barra-produto span {
                font-size: 11px;
            }

        }

    </style>

</head>


<body>

<?php include 'admin-header.php'; ?>


<div id="wrapper">

    <aside id="sidebar">

        <nav>

            <a href="admin-dashboard.php">
                Dashboard
            </a>

            <a href="admin-pedidos.php">
                Pedidos
            </a>

            <a href="admin-estoque.php">
                Estoque
            </a>

            <a href="admin-relatorio.php" class="ativo">
                Relatórios
            </a>

            <a href="admin-usuarios.php">
                Usuários
            </a>

        </nav>

    </aside>


    <main>


        <!-- TÍTULO -->

        <section>

            <h1>
                Relatório de Vendas
            </h1>

            <p>
                Consulte os dados de vendas da cantina.
            </p>

        </section>



        <!-- FILTROS -->

        <section>

            <h2>
                Período
            </h2>

            <form
                action="admin-relatorio.php"
                method="GET"
                class="filtros"
            >

                <div>

                    <label for="data_inicio">
                        Data inicial
                    </label>

                    <input
                        type="date"
                        id="data_inicio"
                        name="data_inicio"
                    >

                </div>


                <div>

                    <label for="data_fim">
                        Data final
                    </label>

                    <input
                        type="date"
                        id="data_fim"
                        name="data_fim"
                    >

                </div>


                <button type="submit">
                    Gerar Relatório
                </button>

            </form>

        </section>



        <!-- RESUMO -->

        <section>

            <h2>
                Resumo
            </h2>


            <div class="resumo">


                <div class="card">

                    <h3>
                        Total de Pedidos
                    </h3>

                    <p>
                        72
                    </p>

                </div>


                <div class="card">

                    <h3>
                        Total Vendido
                    </h3>

                    <p>
                        R$ 1.250,00
                    </p>

                </div>


                <div class="card">

                    <h3>
                        Produtos Vendidos
                    </h3>

                    <p>
                        145
                    </p>

                </div>


            </div>

        </section>



        <!-- GRÁFICO -->

        <section>

            <h2>
                Produtos Mais Vendidos
            </h2>


            <div class="grafico">


                <div class="barra-produto">

                    <span>
                        31
                    </span>

                    <div class="barra barra-1"></div>

                    <span>
                        X-Burguer
                    </span>

                </div>


                <div class="barra-produto">

                    <span>
                        27
                    </span>

                    <div class="barra barra-2"></div>

                    <span>
                        Coxinha
                    </span>

                </div>


                <div class="barra-produto">

                    <span>
                        42
                    </span>

                    <div class="barra barra-3"></div>

                    <span>
                        Coca-Cola
                    </span>

                </div>


                <div class="barra-produto">

                    <span>
                        45
                    </span>

                    <div class="barra barra-4"></div>

                    <span>
                        Suco
                    </span>

                </div>


            </div>

        </section>



        <!-- TABELA -->

        <section>

            <h2>
                Vendas por Produto
            </h2>


            <div class="tabela-container">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Produto
                            </th>

                            <th>
                                Quantidade Vendida
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                Suco
                            </td>

                            <td>
                                45
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Coca-Cola
                            </td>

                            <td>
                                42
                            </td>

                        </tr>


                        <tr>

                            <td>
                                X-Burguer
                            </td>

                            <td>
                                31
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Coxinha
                            </td>

                            <td>
                                27
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>


    </main>

</div>


</body>

</html>