<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-dashboard.css">

</head>
<body>


    <?php include "admin-header.php" ?>


    <div id="wrapper">

        <aside id="sidebar">
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

            <!-- Cards de Resumo -->
            <div id="cards-resumo">

                <div class="stat-card laranja">
                    <div class="icone"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Pedidos pendentes</p>
                    </div>
                </div>

                <div class="stat-card verde">
                    <div class="icone"><i class="bi bi-check-circle-fill"></i></div>
                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Concluídos hoje</p>
                    </div>
                </div>

                <div class="stat-card azul">
                    <div class="icone"><i class="bi bi-cash-stack"></i></div>
                    <div>
                        <p class="valor">R$ 99,99</p>
                        <p class="rotulo">Faturamento do dia</p>
                    </div>
                </div>

                <div class="stat-card vermelho">
                    <div class="icone"><i class="bi bi-exclamation-triangle-fill"></i></div>
                    <div>
                        <p class="valor">99</p>
                        <p class="rotulo">Produtos com estoque baixo</p>
                    </div>
                </div>

            </div>

            <div id="dashboard-grid">

                <section class="painel">
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

                <aside class="painel">
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