<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        main {
            display: block !important;
            width: 100% !important;
            box-sizing: border-box !important;
            padding: 24px 28px 40px 34px !important;
            margin: 0 !important;
        }

        #cabecalho-dashboard {
            display: block !important;
            width: 100% !important;
            margin: 0 0 22px 0 !important;
            padding: 0 !important;
        }

        #cabecalho-dashboard h1 {
            margin: 0 !important;
            padding: 0 !important;
            font-size: 32px !important;
            line-height: 1.2 !important;
            color: #071a40 !important;
            font-weight: 700 !important;
        }

        #cabecalho-dashboard p {
            margin: 5px 0 0 0 !important;
            padding: 0 !important;
            font-size: 16px !important;
            color: #71809d !important;
        }

        #cards-resumo {
            display: grid !important;
            grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
            gap: 20px !important;
            width: 100% !important;
            margin: 0 0 22px 0 !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        .stat-card {
            width: 100% !important;
            height: 100px !important;
            min-width: 0 !important;
            margin: 0 !important;
            padding: 0 20px !important;
            box-sizing: border-box !important;

            display: flex !important;
            align-items: center !important;
            gap: 20px !important;

            background: #ffffff !important;
            border-radius: 14px !important;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06) !important;
        }

        .stat-card .icone {
            width: 58px !important;
            height: 58px !important;
            min-width: 58px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            border-radius: 14px !important;
        }

        .stat-card .icone i {
            font-size: 27px !important;
            color: #ffffff !important;
        }

        .stat-card.laranja .icone {
            background: #ffab00 !important;
        }

        .stat-card.verde .icone {
            background: #36b37e !important;
        }

        .stat-card.azul .icone {
            background: #168bea !important;
        }

        .stat-card.vermelho .icone {
            background: #f04444 !important;
        }

        .stat-card .valor {
            margin: 0 !important;
            padding: 0 !important;
            font-size: 27px !important;
            line-height: 1.1 !important;
            font-weight: 700 !important;
            color: #071a40 !important;
        }

        .stat-card .rotulo {
            margin: 4px 0 0 0 !important;
            padding: 0 !important;
            font-size: 15px !important;
            line-height: 1.2 !important;
            color: #71809d !important;
        }

        #dashboard-grid {
            display: flex !important;
            flex-direction: row !important;
            align-items: stretch !important;
            gap: 24px !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        #dashboard-grid .painel-pedidos {
            flex: 1 !important;
            width: auto !important;
            min-width: 0 !important;
            margin: 0 !important;
        }

        #dashboard-grid .painel-vendas {
            flex: 1 !important;
            width: auto !important;
            min-width: 0 !important;
            margin: 0 !important;
        }

        #dashboard-grid .painel-pedidos,
        #dashboard-grid .painel-vendas {
            width: 100% !important;
            min-width: 0 !important;
            min-height: 375px !important;
            height: 375px !important;
            margin: 0 !important;
            padding: 24px !important;
            box-sizing: border-box !important;

            background: #ffffff !important;
            border-radius: 14px !important;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06) !important;
        }

        .painel-pedidos h2,
        .painel-vendas h2 {
            margin: 0 0 22px 0 !important;
            padding: 0 !important;

            font-size: 23px !important;
            line-height: 1.2 !important;
            font-weight: 700 !important;

            color: #071a40 !important;
        }

        #tabela-pedidos {
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
        }

        #tabela-pedidos th {
            padding: 10px 8px !important;
            text-align: left !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            color: #71809d !important;
            border-bottom: 1px solid #e5eaf1 !important;
        }

        #tabela-pedidos td {
            padding: 12px 8px !important;
            font-size: 15px !important;
            color: #071a40 !important;
            border-bottom: 1px solid #e5eaf1 !important;
        }

        #tabela-pedidos th:nth-child(1),
        #tabela-pedidos td:nth-child(1) {
            width: 9% !important;
        }

        #tabela-pedidos th:nth-child(2),
        #tabela-pedidos td:nth-child(2) {
            width: 19% !important;
        }

        #tabela-pedidos th:nth-child(3),
        #tabela-pedidos td:nth-child(3) {
            width: 28% !important;
        }

        #tabela-pedidos th:nth-child(4),
        #tabela-pedidos td:nth-child(4) {
            width: 27% !important;
        }

        #tabela-pedidos th:nth-child(5),
        #tabela-pedidos td:nth-child(5) {
            width: 17% !important;
        }

        .status-badge {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 5px 12px !important;
            border-radius: 20px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
        }

        .status-badge.pendente {
            background: #fff0c9 !important;
            color: #e99a00 !important;
        }

        .status-badge.concluido {
            background: #d9f4e8 !important;
            color: #159b63 !important;
        }

        .categoria-linha {
            width: 100% !important;
            margin: 0 0 34px 0 !important;
            padding: 0 !important;
        }

        .categoria-linha:last-child {
            margin-bottom: 0 !important;
        }

        .categoria-topo {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            width: 100% !important;
            margin: 0 0 9px 0 !important;
            padding: 0 !important;
            font-size: 16px !important;
            color: #071a40 !important;
        }

        .barra-fundo {
            width: 100% !important;
            height: 11px !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #edf1f5 !important;
            border-radius: 20px !important;
            overflow: hidden !important;
        }

        .barra-preenchida {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #36b37e !important;
            border-radius: 20px !important;
        }

        @media (max-width: 1100px) {

            #cards-resumo {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            #dashboard-grid {
                flex-direction: column !important;
            }

        }

        @media (max-width: 600px) {

            main {
                padding: 18px !important;
            }

            #cards-resumo {
                grid-template-columns: 1fr !important;
            }

            .stat-card {
                height: 95px !important;
            }

            #dashboard-grid .painel-pedidos,
        #dashboard-grid .painel-vendas {
                height: auto !important;
                min-height: 375px !important;
                padding: 18px !important;
            }

            #tabela-pedidos th,
            #tabela-pedidos td {
                padding: 8px 4px !important;
                font-size: 12px !important;
            }

        }

    </style>

</head>

<body>

    <?php include "admin-header.php" ?>

    <div id="wrapper">

        <aside id="sidebar">
        <a href="javascript:void(0)" class="fechar-sidebar" onclick="alternarSidebar()">×</a>
            <nav>

                <a href="admin-dashboard.php" class="ativo">Dashboard</a>
                <a href="admin-pedidos.php">Pedidos</a>
                <a href="admin-estoque.php">Estoque</a>
                <a href="admin-relatorio.php">Relatórios</a>
                <a href="admin-usuarios.php">Usuários</a>

            </nav>

        </aside>

        <main>

            <div id="cabecalho-dashboard">

                <h1>Dashboard</h1>

                <p>Resumo geral de hoje</p>

            </div>

            <div id="cards-resumo">

                <div class="stat-card laranja">

                    <div class="icone">
                        <i class="bi bi-cart-fill"></i>
                    </div>

                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Pedidos pendentes</p>
                    </div>

                </div>

                <div class="stat-card verde">

                    <div class="icone">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Concluídos hoje</p>
                    </div>

                </div>

                <div class="stat-card azul">

                    <div class="icone">
                        <i class="bi bi-currency-dollar"></i>
                    </div>

                    <div>
                        <p class="valor">R$ 99,99</p>
                        <p class="rotulo">Faturamento do dia</p>
                    </div>

                </div>

                <div class="stat-card vermelho">

                    <div class="icone">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Produtos com estoque baixo</p>
                    </div>

                </div>

            </div>

            <div id="dashboard-grid">

                <section class="painel-pedidos">

                    <h2>Pedidos recentes</h2>

                    <table id="tabela-pedidos">

                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Itens</th>
                                <th>Status</th>
                                <th>Hora</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>#99</td>
                                <td>Cliente</td>
                                <td>99x Hot-dog</td>
                                <td><span class="status-badge pendente">Pendente</span></td>
                                <td>99:99</td>
                            </tr>

                            <tr>
                                <td>#99</td>
                                <td>Cliente</td>
                                <td>99x Hot-dog</td>
                                <td><span class="status-badge concluido">Concluído</span></td>
                                <td>99:99</td>
                            </tr>

                            <tr>
                                <td>#99</td>
                                <td>Cliente</td>
                                <td>99x Hot-dog</td>
                                <td><span class="status-badge pendente">Pendente</span></td>
                                <td>99:99</td>
                            </tr>

                            <tr>
                                <td>#99</td>
                                <td>Cliente</td>
                                <td>99x Hot-dog</td>
                                <td><span class="status-badge concluido">Concluído</span></td>
                                <td>99:99</td>
                            </tr>

                            <tr>
                                <td>#99</td>
                                <td>Cliente</td>
                                <td>99x Hot-dog</td>
                                <td><span class="status-badge concluido">Concluído</span></td>
                                <td>99:99</td>
                            </tr>

                        </tbody>

                    </table>

                </section>

                <aside class="painel-vendas">

                    <h2>Vendas por categoria</h2>

                    <div class="categoria-linha">

                        <div class="categoria-topo">
                            <span>Salgados</span>
                            <span>99%</span>
                        </div>

                        <div class="barra-fundo">
                            <div class="barra-preenchida" style="width: 99%;"></div>
                        </div>

                    </div>

                    <div class="categoria-linha">

                        <div class="categoria-topo">
                            <span>Bebidas</span>
                            <span>99%</span>
                        </div>

                        <div class="barra-fundo">
                            <div class="barra-preenchida" style="width: 99%;"></div>
                        </div>

                    </div>

                    <div class="categoria-linha">

                        <div class="categoria-topo">
                            <span>Doces</span>
                            <span>99%</span>
                        </div>

                        <div class="barra-fundo">
                            <div class="barra-preenchida" style="width: 99%;"></div>
                        </div>

                    </div>

                </aside>

            </div>

        </main>

    </div>

</body>

</html>