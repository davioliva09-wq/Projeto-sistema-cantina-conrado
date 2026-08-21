<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Relatórios - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="../../css/style-dashboard.css">

    <style>

        main {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        section {
            margin-bottom: 30px;
        }

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

        .resumo {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #333;
            padding: 15px;
            min-width: 180px;
        }

        .grafico {
            display: flex;
            align-items: end;
            gap: 25px;
            height: 250px;
            padding: 20px;
            border-bottom: 2px solid #333;
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

    </style>

</head>


<body>


<?php include 'header.php'; ?>


    <main>


        <!-- Título -->

        <section>

            <h1>
                Relatório de Vendas
            </h1>

            <p>
                Consulte os dados de vendas da cantina.
            </p>

        </section>


        <!-- Filtros -->

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


        <!-- Resumo -->

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


        <!-- Gráfico -->

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


        <!-- Tabela -->

        <section>

            <h2>
                Vendas por Produto
            </h2>


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

        </section>


    </main>


    <footer>

        <nav>

            <a href="privacidade.php">
                Políticas de Privacidade
            </a>

            <a href="termos.php">
                Termos de Uso
            </a>

        </nav>


        <p>
            © 2026 Escola Padre Conrado C. Silva Alves |
            Todos os direitos reservados.
        </p>

    </footer>


</body>

</html>