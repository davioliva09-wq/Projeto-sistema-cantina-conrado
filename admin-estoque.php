<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style-dashboard.css">
</head>
<body>

    <!-- Cabeçalho Principal -->
    <?php include "header.php" ?>
        
        <!-- Menu Lateral de Navegação -->
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="#">Relatório</a></li>
                <li><a href="php/admin-estoque.php">Estoque</a></li>
            </ul>
        </nav>
    </header>

    <!-- Seção de Filtros e Busca -->
    <section>
        <form>
            <!-- Barra de Pesquisa -->
            <input type="search" placeholder="Pesquisar...">
        </form>

        <!-- Filtros de Categorias -->
        <nav>
            <ul>
                <li><a href="#">Todos</a></li>
                <li><a href="#">Salgados</a></li>
                <li><a href="#">Doces</a></li>
                <li><a href="#">Bebidas</a></li>
            </ul>
        </nav>

        <!-- Botão para Adicionar Novo Produto -->
        <form action="admin-prod-cad.php" method="get">
            <button type="submit">+ Produto</button>
        </form>

    </section>

    <!-- Grade de Produtos -->
    <main>
        <section>
            <!-- Produto 1 -->
            <article>

                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <form action="admin-edicao.php?id=1" method="get">
                <button type="submit">Editar</button>
                </form>
                
            </article>

            <!-- Produto 2 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <form action="admin-edicao.php?id=2" method="get">
                <button type="submit">Editar</button>
                </form>
            </article>

            <!-- Produto 3 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>

            <!-- Produto 4 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <a href="admin-edicao">
                <button type="button">Editar</button>
                </a>
            </article>

            <!-- Produto 5 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>

            <!-- Produto 6 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>

            <!-- Produto 7 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>

            <!-- Produto 8 -->
            <article>
                <img class=smolpng src="../../img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>

            <!-- Produto 9 -->
            <article>
                <img class=smolpng src="..././img/hot-dog.png" alt="Hot-dog">
                <h2>Hot-dog</h2>
                <p>R$ 19,99</p>
                <p>Estoque: 99</p>
                <button type="button">Editar</button>
            </article>
        </section>
    </main>

</body>
</html>
