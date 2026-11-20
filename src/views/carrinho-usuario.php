<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../routes/conexao.php';
require_once '../models/produtos.php';
require_once '../models/carrinho.php';

$carrinhoService = new Carrinho();

if (isset($_GET['acao']) && $_GET['acao'] === 'add' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $qtd = (int) ($_GET['qtd'] ?? 1);

    $stmt = $conn->prepare("SELECT nome, estoque FROM produtos WHERE id_produto = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto && (int)$produto['estoque'] > 0) {
        $sucesso = $carrinhoService->addCarrinho($id, $qtd, $produto['estoque']);
        
        if (!$sucesso) {
            $_SESSION['msg_erro'] = "Quantidade indisponível! Estoque máximo de {$produto['nome']}: {$produto['estoque']} unidade(s).";
        }
    } else {
        $_SESSION['msg_erro'] = "Produto esgotado ou não encontrado.";
    }

    header("Location: carrinho-usuario.php");
    exit;
}

$msgErro = $_SESSION['msg_erro'] ?? '';
unset($_SESSION['msg_erro']);

if (isset($_GET['remover'])) {
    $carrinhoService->remover($_GET['remover']);
    header("Location: carrinho-usuario.php");
    exit;
}

$carrinhoSessao = $carrinhoService->getItens();
$itensDetalhados = [];
$totalPedido = 0;
$totalItens = 0;

if (!empty($carrinhoSessao)) {
    $ids = array_keys($carrinhoSessao);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    
    $stmt = $conn->prepare("SELECT id_produto, nome, descricao, preco, imagem FROM produtos
     WHERE id_produto IN ($placeholders)");
    $stmt->execute($ids);
    $produtosBanco = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtosBanco as $prod) {
        $id = $prod['id_produto'];
        $qtd = $carrinhoSessao[$id];
        $subtotal = (float)$prod['preco'] * $qtd;

        $totalPedido += $subtotal;
        $totalItens += $qtd;

        $itensDetalhados[] = [
            'id' => $id,
            'nome' => $prod['nome'],
            'descricao' => $prod['descricao'] ?? 'Sem descrição.',
            'preco' => (float)$prod['preco'],
            'imagem' => !empty($prod['imagem']) ? "images/" . basename($prod['imagem']) : 'fundo-abstrato-cinza_1134661-11961.webp',
            'qtd' => $qtd,
            'subtotal' => $subtotal
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Cantina Conrado</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-carrinho.css">
    <link rel="stylesheet" href="https://cloudflare.com">
</head>

<body>
    
    <?php include "header.php" ?>

    <div class="card">
        <div>
            <h2>Itens (<?php echo str_pad($totalItens, 2, '0', STR_PAD_LEFT); ?>)</h2>

            <?php if (!empty($msgErro)): ?>
                <div style="background-color: #fee2e2; color: #b91c1c; border: 1px solid #f87171; padding: 12px 16px; border-radius: 8px; margin: 15px 0; display: flex; align-items: center; gap: 10px; font-size: 0.95rem;">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?php echo htmlspecialchars($msgErro); ?></span>
                </div>
            <?php endif; ?>
            
            <?php if (empty($itensDetalhados)): ?>
                <hr>
                <p style="padding: 20px 0; text-align: center;">Seu carrinho está vazio no momento.</p>
                <div class="card-continuar-compra">
                    <a href="catalogo.php"><i class="fa-solid fa-arrow-left seta"></i>Voltar para o cardápio</a>
                </div>
            <?php else: ?>

                <div class="informacao">
                    <h3 class="info-preco">Preço</h3>
                    <h3 class="info-quantidade">Qtd.</h3>
                </div>
                <hr>

                <?php foreach ($itensDetalhados as $item): ?>
                    <div class="item-carrinho">
                        <img class="foto-produto" src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>">

                        <div style="flex: 1;">
                            <h3 class="nome-item"><?php echo htmlspecialchars($item['nome']); ?></h3>
                            <p class="desc-item"><?php echo htmlspecialchars($item['descricao']); ?></p>
                            <a href="carrinho-usuario.php?remover=<?php echo $item['id']; ?>" style="color: #dc2626; font-size: 0.85rem; text-decoration: none;">
                                <i class="fa-solid fa-trash"></i> Remover
                            </a>
                        </div>

                        <div style="text-align: right; min-width: 120px;">
                            <p class="preco-item">R$ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?></p>
                            <p class="qtd-item"><?php echo $item['qtd']; ?>x (R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>)</p>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <div class="card-continuar-compra">
                    <a href="catalogo.php"><i class="fa-solid fa-arrow-left seta"></i>Continuar comprando</a>
                </div>

                <div class="card-resumo">
                    <h3>Resumo do pedido</h3>
                    <div class="linha-resumo">
                        <p><?php echo $totalItens; ?> <?php echo $totalItens > 1 ? 'Itens' : 'Item'; ?></p>
                    </div>
                    <div class="linha-total">
                        <strong>Total</strong>
                        <span class="preco-total">R$ <?php echo number_format($totalPedido, 2, ',', '.'); ?></span>
                    </div>
                    
                    <a href="pagamento.php">
                        <button class="botao-finalizar">
                            <i class="fa-solid fa-bag-shopping sacola"></i> Finalizar pedido
                        </button>
                    </a>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>
</html>
