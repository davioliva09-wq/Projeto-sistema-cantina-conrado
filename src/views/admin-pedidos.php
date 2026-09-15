<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedidos - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include "admin-header.php" ?>


    <div id="wrapper">

        <aside id="sidebar">

            <nav>

                <a href="admin-dashboard.php">Dashboard</a>

                <a href="admin-pedidos.php" class="ativo">Pedidos</a>

                <a href="admin-estoque.php">Estoque</a>

                <a href="admin-relatorio.php">Relatórios</a>

                <a href="admin-usuarios.php">Usuários</a>

            </nav>

        </aside>


        <main>

            <section class="pedidos">

                <h1>Pedidos</h1>


                <div class="pedidos-container">


                    <!-- =================================================
                         NOVOS PEDIDOS
                         Futuramente estes pedidos virão do banco de dados.
                         ================================================= -->

                    <div class="coluna-pedidos novos">

                        <h2>Novos pedidos</h2>


                        <article class="pedido-card" data-pedido="001" data-status="novo">

                            <div class="pedido-topo">

                                <h3>Pedido #001</h3>

                                <span>14:32</span>

                            </div>


                            <p>
                                <strong>Cliente:</strong>
                                João Silva
                            </p>


                            <p>
                                <strong>Produtos:</strong><br>
                                X-Burguer<br>
                                Coca-Cola
                            </p>


                            <p class="total">
                                Total: R$ 18,00
                            </p>


                            <button type="button" onclick="aceitarPedido(this)">
                                Aceitar
                            </button>

                        </article>



                        <article class="pedido-card" data-pedido="002" data-status="novo">

                            <div class="pedido-topo">

                                <h3>Pedido #002</h3>

                                <span>14:35</span>

                            </div>


                            <p>
                                <strong>Cliente:</strong>
                                Maria Souza
                            </p>


                            <p>
                                <strong>Produtos:</strong><br>
                                Coxinha<br>
                                Suco
                            </p>


                            <p class="total">
                                Total: R$ 10,00
                            </p>


                            <button type="button" onclick="aceitarPedido(this)">
                                Aceitar
                            </button>

                        </article>

                    </div>



                    <!-- =================================================
                         PEDIDOS PRONTOS
                         ================================================= -->

                    <div class="coluna-pedidos prontos">

                        <h2>Prontos</h2>

                    </div>



                    <!-- =================================================
                         PEDIDOS ENTREGUES
                         ================================================= -->

                    <div class="coluna-pedidos entregues">

                        <h2>Entregues</h2>

                    </div>


                </div>

            </section>

        </main>

    </div>



    <style>

        /* ==========================================
           ÁREA DE PEDIDOS
           Não altera a sidebar nem o cabeçalho.
           ========================================== */

        .pedidos {
            width: 100%;
        }


        .pedidos h1 {
            margin-bottom: 25px;
        }


        .pedidos-container {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            width: 100%;

        }


        /* ==========================================
           COLUNAS
           ========================================== */

        .coluna-pedidos {

            background: #f5f6f8;

            border: 1px solid #ddd;

            border-radius: 10px;

            padding: 15px;

            min-height: 400px;

        }


        .coluna-pedidos h2 {

            margin: 0 0 15px 0;

            font-size: 20px;

            color: #071a40;

        }


        /* ==========================================
           CARD DO PEDIDO
           ========================================== */

        .pedido-card {

            background: white;

            border: 1px solid #ddd;

            border-radius: 8px;

            padding: 15px;

            margin-bottom: 15px;

        }


        .pedido-topo {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 10px;

        }


        .pedido-topo h3 {

            margin: 0;

            font-size: 16px;

            color: #071a40;

        }


        .pedido-topo span {

            font-size: 13px;

            color: #777;

        }


        .pedido-card p {

            margin: 8px 0;

            font-size: 14px;

            color: #444;

            line-height: 1.5;

        }


        .pedido-card .total {

            text-align: right;

            font-weight: bold;

            color: #071a40;

        }


        /* ==========================================
           BOTÕES
           ========================================== */

        .pedido-card button {

            width: 100%;

            border: none;

            border-radius: 6px;

            padding: 10px;

            margin-top: 8px;

            background: #071a40;

            color: white;

            font-weight: bold;

            cursor: pointer;

        }


        .pedido-card button:hover {

            opacity: 0.9;

        }


        /* Botão da coluna Prontos */

        .prontos .pedido-card button {

            background: #22a861;

        }


        /* Botão dos pedidos entregues */

        .entregues .pedido-card button {

            background: #aaa;

            cursor: default;

        }


        /* ==========================================
           RESPONSIVIDADE
           ========================================== */

        @media (max-width: 1000px) {

            .pedidos-container {

                grid-template-columns: 1fr;

            }

        }

    </style>

</body>

</html>