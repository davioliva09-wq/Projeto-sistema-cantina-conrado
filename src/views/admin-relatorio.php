<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>

        main {
            flex: 1;
            display: block;
            justify-content: initial;
            padding: 30px 40px;
        }

        main h1 {
            margin: 0;
            font-size: 1.8rem;
            color: #222;
        }

        main h2 {
            margin: 0 0 15px;
            font-size: 1.1rem;
            color: #222;
        }

        main p {
            color: #777;
        }

        main section {
            margin-bottom: 30px;
            background-color: #fff;
        }

        /* FILTROS */

        .filtros {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filtros div {
            display: flex;
            flex-direction: column;
        }

        .filtros label {
            margin-bottom: 5px;
            font-size: 0.85rem;
            color: #555;
        }

        .filtros input {
            height: 38px;
            padding: 0 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .filtros button {
            height: 38px;
            padding: 0 20px;
            border: none;
            border-radius: 6px;
            background-color: var(--laranja);
            color: #040227;
            font-weight: bold;
            cursor: pointer;
        }

        .filtros button:hover {
            background-color: #e09304;
        }

        /* PAINEL */

        .painel {
            background-color: #fff;
            border: 1.5px solid #eee;
            border-radius: 12px;
            padding: 20px 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .painel-topo {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .painel-topo h2 {
            margin: 0;
        }

        .subtitulo {
            margin: 5px 0 0;
            font-size: 0.85rem;
            color: #888;
        }

        .badge-periodo {
            background-color: #f2f2f2;
            color: #555;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        /* GRÁFICO */

        .grafico {
            display: flex;
            align-items: end;
            justify-content: center;
            gap: 35px;
            height: 220px;
            padding: 20px 10px 0;
            border-bottom: 2px solid #eee;
            box-sizing: border-box;
        }

        .barra-produto {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            gap: 8px;
            height: 100%;
        }

        .valor-barra {
            font-size: 0.85rem;
            font-weight: bold;
            color: #333;
        }

        .barra {
            width: 45px;
            border-radius: 6px 6px 0 0;
        }

        .nome-produto {
            font-size: 0.8rem;
            color: #555;
            text-align: center;
        }

        /* RESUMO */

        .cards-resumo {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #fff;
            border: 1.5px solid #eee;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-card .icone {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #fff;
            flex-shrink: 0;
        }

        .stat-card .valor {
            margin: 0;
            font-size: 1.4rem;
            font-weight: bold;
            color: #222;
        }

        .stat-card .rotulo {
            margin: 2px 0 0;
            font-size: 0.85rem;
            color: #888;
        }

        .stat-card.laranja .icone  { background-color: var(--laranja); }
        .stat-card.verde .icone    { background-color: var(--verde); }
        .stat-card.azul .icone     { background-color: var(--azul); }
        .stat-card.vermelho .icone { background-color: var(--vermelho); }

        /* RESUMO RÁPIDO */

        .tags-produtos {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag-produto {
            background-color: var(--verde-claro);
            color: var(--verde-escuro);
            border: 1px solid var(--verde);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* TABELA */

        .tabela-container {
            padding: 0;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            font-size: 0.9rem;
            color: #333;
            border-bottom: 1px solid #f2f2f2;
        }

        th {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #999;
            border-bottom: 2px solid #eee;
        }

        tr:last-child td {
            border-bottom: none;
        }

    </style>
</head>


<body>

<?php include 'admin-header.php'; ?>

<div id="wrapper">

    <aside id="sidebar">
        <a href="javascript:void(0)" class="fechar-sidebar" onclick="alternarSidebar()">×</a>
        <nav>
            <a href="admin-dashboard.php">Dashboard</a>
            <a href="admin-pedidos.php">Pedidos</a>
            <a href="admin-estoque.php">Estoque</a>
            <a href="admin-relatorio.php" class="ativo">Relatórios</a>
            <a href="admin-usuarios.php">Usuários</a>
        </nav>
    </aside>

    <main>

        <!-- TÍTULO -->
        <div>
            <h1 style="color: var(--azul-marinho);">Relatório de Vendas</h1>
            <p>Consulte os dados de vendas da cantina.</p>
        </div>

        <!-- FILTROS -->
        <section>
            <h1 style="color: var(--laranja);">Período</h1>
            <form action="admin-relatorio.php" method="GET" class="filtros">
                <div>
                    <label for="data_inicio">Data inicial</label>
                    <input type="date" id="data_inicio" name="data_inicio">
                </div>
                <div>
                    <label for="data_fim">Data final</label>
                    <input type="date" id="data_fim" name="data_fim">
                </div>
                <button type="submit">Gerar Relatório</button>
            </form>
        </section>

        <!-- GRÁFICO -->
        <section>
            <div class="painel">

                <div class="painel-topo">
                    <div>
                        <h2>Produtos Mais Vendidos</h2>
                        <p class="subtitulo">Veja quais produtos tiveram mais saída no período.</p>
                    </div>
                    <span class="badge-periodo">Maio/2025</span>
                </div>

                <div class="grafico">

                    <div class="barra-produto">
                        <span class="valor-barra">31</span>
                        <div class="barra" style="height: 125px; background-color: var(--cor-1);"></div>
                        <span class="nome-produto">X-Burguer</span>
                    </div>

                    <div class="barra-produto">
                        <span class="valor-barra">27</span>
                        <div class="barra" style="height: 110px; background-color: var(--cor-2);"></div>
                        <span class="nome-produto">Coxinha</span>
                    </div>

                    <div class="barra-produto">
                        <span class="valor-barra">42</span>
                        <div class="barra" style="height: 170px; background-color: var(--cor-3);"></div>
                        <span class="nome-produto">Coca-Cola</span>
                    </div>

                    <div class="barra-produto">
                        <span class="valor-barra">45</span>
                        <div class="barra" style="height: 180px; background-color: var(--cor-4);"></div>
                        <span class="nome-produto">Suco</span>
                    </div>

                </div>

            </div>
        </section>

        <!-- RESUMO -->
        <section>
            <h2 class="relatorio-title">Resumo</h2>
            <div class="cards-resumo">

                <div class="stat-card azul">
                    <div class="icone"><i class="bi bi-receipt-cutoff"></i></div>
                    <div>
                        <p class="valor">72</p>
                        <p class="rotulo">Total de pedidos</p>
                    </div>
                </div>

                <div class="stat-card verde">
                    <div class="icone"><i class="bi bi-cash-stack"></i></div>
                    <div>
                        <p class="valor">R$ 1.250,00</p>
                        <p class="rotulo">Total vendido</p>
                    </div>
                </div>

                <div class="stat-card laranja">
                    <div class="icone"><i class="bi bi-basket2-fill"></i></div>
                    <div>
                        <p class="valor">145</p>
                        <p class="rotulo">Produtos vendidos</p>
                    </div>
                </div>

                <div class="stat-card vermelho">
                    <div class="icone"><i class="bi bi-star-fill"></i></div>
                    <div>
                        <p class="valor">Suco</p>
                        <p class="rotulo">Produto mais vendido</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- RESUMO RÁPIDO -->
        <section>
            <h2 class="relatorio-title">Resumo Rápido</h2>
            <div class="tags-produtos">
                <span class="tag-produto">X-Burguer — 31 unidades</span>
                <span class="tag-produto">Coxinha — 27 unidades</span>
                <span class="tag-produto">Coca-Cola — 42 unidades</span>
                <span class="tag-produto">Suco — 45 unidades</span>
            </div>
        </section>

        <!-- TABELA -->
        <section>
            <h2 class="relatorio-title">Vendas por Produto</h2>
            <div class="painel tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade Vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Suco</td>
                            <td>45</td>
                        </tr>
                        <tr>
                            <td>Coca-Cola</td>
                            <td>42</td>
                        </tr>
                        <tr>
                            <td>X-Burguer</td>
                            <td>31</td>
                        </tr>
                        <tr>
                            <td>Coxinha</td>
                            <td>27</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</div>

</body>
</html>