<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/style-estoque.css">

</head>
<body>

    <!-- Cabeçalho Principal -->
    <?php include "admin-header.php" ?>

    <!-- Menu Lateral de Navegação -->
    <div id="wrapper">

        <aside id="sidebar">
            <nav>
                <a href="admin-dashboard.php">Dashboard</a>
                <a href="admin-pedidos.php">Pedidos</a>
                <a href="admin-estoque.php" class="ativo">Estoque</a>
                <a href="admin-relatorio.php">Relatórios</a>
                <a href="admin-usuarios.php">Usuários</a>
           </nav>
       </aside>

        <main>

            <!-- Barra de busca e botão de novo produto -->
            <div id="topo-produtos">
                <form id="form-busca" role="search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="busca" placeholder="Pesquisar...">
                </form>

                <form action="admin-prod-cad.php" method="get">
                    <button type="submit" id="btn-add-produto">+ Produto</button>
                </form>
            </div>

            <!-- Filtros de Categorias -->
            <nav id="filtros-categoria">
                <ul>
                    <li><a href="#">Todos</a></li>
                    <li><a href="#" class="ativo">Salgados</a></li>
                    <li><a href="#">Doces</a></li>
                    <li><a href="#">Bebidas</a></li>
                </ul>
            </nav>

            <!-- Grade de Produtos -->
            <section id="grade-produtos">

                <!-- Produto 1 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <form action="admin-edicao.php?id=1" method="get">
                        <button type="submit" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                    </form>
                </article>

                <!-- Produto 2 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <form action="admin-edicao.php?id=2" method="get">
                        <button type="submit" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                    </form>
                </article>

                <!-- Produto 3 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

                <!-- Produto 4 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <a href="admin-edicao">
                        <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                    </a>
                </article>

                <!-- Produto 5 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

                <!-- Produto 6 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

                <!-- Produto 7 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

                <!-- Produto 8 -->
                <article class="produto-card">
                    <img class="smolpng" src="../../images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

                <!-- Produto 9 -->
                <article class="produto-card">
                    <img class="smolpng" src="..././images/hotdog.png" alt="Hot-dog">
                    <div class="produto-info">
                        <h2>Hot-dog</h2>
                        <p>R$ 19,99</p>
                        <p>Estoque: 99</p>
                    </div>
                    <button type="button" class="btn-editar"><i class="bi bi-pencil-square"></i></button>
                </article>

            </section>

        </main>

    </div>

</body>
</html>