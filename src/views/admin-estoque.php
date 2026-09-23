<?php /*
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once '../../routes/conexao.php'; 
require_once '../models/produtos.php'; 

$produtoService = new Produto($conn); 
$termoPesquisa = isset($_GET['busca']) ? $_GET['busca'] : ''; 

$produtosDoEstoque = $produtoService->buscaProdNome($termoPesquisa); 
*/ ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cantina Conrado</title>
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-estoque.css">
</head>
<body>

    <?php include "admin-header.php" ?>

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

            <div id="topo-produtos">
                <form id="form-busca" role="search" method="GET" action="">
                    <i class="bi bi-search"></i>
                    <input type="search" name="busca" placeholder="Pesquisar..." value="<?php echo htmlspecialchars($termoPesquisa); ?>">
                </form>

                <form action="admin-prod-cad.php" method="get">
                    <button type="submit" id="btn-add-produto">+ Produto</button>
                </form>
            </div>

            <nav id="filtros-categoria">
                <ul>
                    <li><a href="#">Todos</a></li>
                    <li><a href="#" class="ativo">Salgados</a></li>
                    <li><a href="#">Doces</a></li>
                    <li><a href="#">Bebidas</a></li>
                </ul>
            </nav>

            <section id="grade-produtos">
                <?php if (!empty($produtosDoEstoque)): ?>
                    <?php foreach($produtosDoEstoque as $item): ?>
                        <article class="produto-card">
                            <img class="smolpng" src="/Sistema%20cantina/src/images/<?php echo htmlspecialchars($item['imagem']); ?>.jpg" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                            
                            <div class="produto-info">
                                <h3><?php echo htmlspecialchars($item['nome']); ?></h3> 
                                <p class="categoria"><?php echo htmlspecialchars($item['categoria']); ?></p> 
                                <p class="descricao"><?php echo htmlspecialchars($item['descricao']); ?></p> 
                                <p class="preco">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></p> 
                                <p class="estoque">Qtd: <?php echo htmlspecialchars($item['estoque']); ?></p> 
                            </div>

                            <form action="admin-edicao.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="btn-editar"> 
                                    <img src="images/pen_placeholder.png" alt="Editar">    
                                </button>
                            </form>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="sem-produtos">Nenhum produto cadastrado ou encontrado.</p>
                <?php endif; ?>
            </section>

        </main>

    </div>

</body>
</html>
