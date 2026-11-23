<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../routes/conexao.php';
require_once '../models/produtos.php';

$produtoService = new Produto($conn);
$termoPesquisa = isset($_GET['q']) ? $_GET['q'] : '';
$produtos = $produtoService->buscaProdNome($termoPesquisa);

$produtosDisponiveis = array_filter($produtos, function($item) {
    $temEstoque = isset($item['estoque']) && (int)$item['estoque'] > 0;
    $estaDisponivel = !isset($item['disponivel']) || $item['disponivel'] == 1 || $item['disponivel'] === true || $item['disponivel'] === 'disponivel';
    return $temEstoque && $estaDisponivel;
});
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Cantina Conrado</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .produto-card {
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .produto-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        }
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.65);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }
        .modal-conteudo {
            background: #fff;
            border-radius: 12px;
            max-width: 480px;
            width: 100%;
            padding: 25px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: abrirModal 0.25s ease-out;
        }
        @keyframes abrirModal {
            from { opacity: 0; transform: scale(0.92); }
            to { opacity: 1; transform: scale(1); }
        }
        .modal-fechar {
            position: absolute;
            top: 12px;
            right: 16px;
            font-size: 28px;
            font-weight: bold;
            color: #666;
            cursor: pointer;
            line-height: 1;
        }
        .modal-fechar:hover {
            color: #000;
        }
        .modal-conteudo img {
            width: 100%;
            max-height: 240px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .modal-conteudo h2 {
            margin: 0 0 8px;
            color: #222;
            font-size: 1.5rem;
        }
        .modal-descricao {
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        .modal-preco {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 15px;
        }
        .modal-qtd-box {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #333;
        }
        .modal-qtd-box input {
            width: 65px;
            padding: 6px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .modal-acoes {
            display: flex;
            gap: 12px;
        }
        .btn-carrinho, .btn-comprar {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-carrinho:hover, .btn-comprar:hover {
            opacity: 0.9;
        }
        .btn-carrinho {
            background-color: #f59e0b;
            color: #fff;
        }
        .btn-comprar {
            background-color: #16a34a;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php require_once("header.php"); ?>

    <main class="catalogo-container">
        <h1>Nosso Cardápio</h1>

        <form action="" method="GET">
            <input name="q" class="campo-busca" type="text" placeholder="Procure o produto" value="<?php echo htmlspecialchars($termoPesquisa); ?>">
            <input class="btn-busca" type="submit" value="Pesquisar">
        </form>

        <div class="produtos-grid">
            <?php if (empty($produtosDisponiveis)): ?>
                <p>Nenhum produto disponível encontrado no momento.</p>
            <?php else: ?>
                <?php foreach ($produtosDisponiveis as $item): ?>
                    <?php
                        $arquivoImagem = !empty($item['imagem']) ? basename($item['imagem']) : 'sem-foto.jpg';
                        $urlImagem = "images/" . htmlspecialchars($arquivoImagem);
                        $precoFormatado = "R$ " . number_format((float)$item['preco'], 2, ',', '.');
                    ?>
                    <div class="produto-card"
                         onclick="abrirProduto(this)"
                         data-id="<?php echo htmlspecialchars($item['id'] ?? ''); ?>"
                         data-nome="<?php echo htmlspecialchars($item['nome']); ?>"
                         data-descricao="<?php echo htmlspecialchars($item['descricao'] ?? 'Sem descrição disponível.'); ?>"
                         data-preco="<?php echo $precoFormatado; ?>"
                         data-estoque="<?php echo htmlspecialchars($item['estoque']); ?>"
                         data-imagem="<?php echo $urlImagem; ?>">
                        <img src="<?php echo $urlImagem; ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                        <h3><?php echo htmlspecialchars($item['nome']); ?></h3>
                        <p class="categoria"><?php echo htmlspecialchars($item['categoria'] ?? 'Geral'); ?></p>
                        <p class="descricao"><?php echo htmlspecialchars($item['descricao'] ?? ''); ?></p>
                        <p class="preco"><?php echo $precoFormatado; ?></p>
                        <p class="estoque">Qtd: <?php echo htmlspecialchars($item['estoque']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <div id="modalProduto" class="modal-overlay" onclick="fecharModalFora(event)">
        <div class="modal-conteudo">
            <span class="modal-fechar" onclick="fecharModal()">&times;</span>
            <img id="modalImg" src="" alt="Imagem do Produto">
            <h2 id="modalNome"></h2>
            <p id="modalDesc" class="modal-descricao"></p>
            <p id="modalPreco" class="modal-preco"></p>
            <div class="modal-qtd-box">
                <label for="modalQtd">Quantidade:</label>
                <input type="number" id="modalQtd" value="1" min="1" max="1">
            </div>
            <div class="modal-acoes">
                <button type="button" class="btn-carrinho" onclick="adicionarCarrinho()">Adicionar ao Carrinho</button>
                <button type="button" class="btn-comprar" onclick="comprarDireto()">Comprar Agora</button>
            </div>
        </div>
    </div>

    <?php require_once("footer.php"); ?>

    <script>
        let produtoAtualId = null;

        function abrirProduto(card) {
            produtoAtualId = card.getAttribute('data-id');
            const nome = card.getAttribute('data-nome');
            const descricao = card.getAttribute('data-descricao');
            const preco = card.getAttribute('data-preco');
            const imagem = card.getAttribute('data-imagem');
            const estoque = card.getAttribute('data-estoque');

            document.getElementById('modalImg').src = imagem;
            document.getElementById('modalNome').textContent = nome;
            document.getElementById('modalDesc').textContent = descricao;
            document.getElementById('modalPreco').textContent = preco;

            const inputQtd = document.getElementById('modalQtd');
            inputQtd.value = 1;
            inputQtd.max = estoque;

            document.getElementById('modalProduto').style.display = 'flex';
        }

        function fecharModal() {
            document.getElementById('modalProduto').style.display = 'none';
        }

        function fecharModalFora(event) {
            if (event.target.id === 'modalProduto') {
                fecharModal();
            }
        }

        function adicionarCarrinho() {
            const qtd = document.getElementById('modalQtd').value;
            window.location.href = `carrinho-usuario.php?acao=add&id=${produtoAtualId}&qtd=${qtd}`;
        }

        function comprarDireto() {
            const qtd = document.getElementById('modalQtd').value;
            window.location.href = `checkout.php?id=${produtoAtualId}&qtd=${qtd}`;
        }
    </script>
</body>
</html>
                    