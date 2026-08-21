<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'conexao.php'; 
require_once 'produtos.php'; 

$produtoService = new Produto($conn);
$produtos = $produtoService->listarProdutos();
?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Catálogo - Cantina Conrado</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <?php require_once("header.php"); ?>

    <main class="catalogo-container">
        <h1>Nosso Cardápio</h1>
        
        <div class="produtos-grid">
            <?php if (empty($produtos)): ?>
                <p>Nenhum produto cadastrado no momento.</p>
            <?php else: ?>
                <?php foreach ($produtos as $item): ?>
                    <?php if ($item['disponivel']): ?>
                        <div class="produto-card">
                            <img src="images/<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                            <h3><?php echo htmlspecialchars($item['nome']); ?></h3>
                            <p class="categoria"><?php echo htmlspecialchars($item['categoria']); ?></p>
                            <p class="descricao"><?php echo htmlspecialchars($item['descricao']); ?></p>
                            <p class="preco">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></p>
                            <p class="estoque">Qtd: <?php echo $item['estoque']; ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body> 
</html>
