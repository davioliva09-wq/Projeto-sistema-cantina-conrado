<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once '../routes/conexao.php'; 
require_once("../models/produtos.php");

$prod = new Produto($conn);
$produtoId = (int) ($_GET['id'] ?? $_POST['produto_id'] ?? 0);

$dados = $prod->buscarPorId($produtoId);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_produto = (int) $_POST['produto_id'];
    $nome       = $_POST['nome'];
    $categoria  = $_POST['tipo'];
    $descricao  = $_POST['descricao'];
    $preco      = (float) $_POST['preco'];
    $estoque    = (int) $_POST['quantidade'];
    $disponivel = ($_POST['disponibilidade'] === 'disponivel');

    $imagem = $dados['imagem'] ?? '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeArquivo = uniqid() . '-' . basename($_FILES['imagem']['name']);
        if (!is_dir('../uploads')) {
            mkdir('../uploads', 0777, true);
        }
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], '../uploads/' . $nomeArquivo)) {
            $imagem = $nomeArquivo;
        }
    }

    if ($prod->editarProduto($id_produto, $nome, $preco, $estoque, $categoria, $descricao, $imagem, $disponivel)) {
        header("Location: admin-estoque.php");
        exit;
    } else {
        $erro = "Erro ao atualizar produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - Cantina Conrado</title>
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include "admin-header.php" ?>

    <div id="wrapper">
        <aside id="sidebar">
            <a href="javascript:void(0)" class="fechar-sidebar" onclick="alternarSidebar()">×</a>
            <nav>
                <a href="admin-dashboard.php">Dashboard</a>
                <a href="admin-pedidos.php">Pedidos</a>
                <a href="admin-estoque.php" class="ativo">Estoque</a>
                <a href="admin-relatorio.php">Relatórios</a>
                <a href="admin-usuarios.php">Usuários</a>
           </nav>
       </aside>

    <main>
        <section>
            <h1>Editar Produto</h1>

            <?php if (isset($erro)): ?>
                <p style="color: red;"><?= $erro ?></p>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="produto_id" value="<?= $dados['id_produto'] ?? $produtoId ?>">

                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dados['nome'] ?? '') ?>" required>

                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo" required>
                    <?php $catAtual = strtolower($dados['categoria'] ?? ''); ?>
                    <option value="lanches" <?= $catAtual === 'lanches' ? 'selected' : '' ?>>Lanches</option>
                    <option value="bebidas" <?= $catAtual === 'bebidas' ? 'selected' : '' ?>>Bebidas</option>
                    <option value="doces" <?= $catAtual === 'doces' ? 'selected' : '' ?>>Doces</option>
                    <option value="salgados" <?= $catAtual === 'salgados' ? 'selected' : '' ?>>Salgados</option>
                </select>

                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="6"><?= htmlspecialchars($dados['descricao'] ?? '') ?></textarea>

                <label for="preco">Preço</label>
                <input type="number" id="preco" name="preco" value="<?= $dados['preco'] ?? '' ?>" step="0.01" min="0" required>

                <label for="imagem">Alterar Imagem</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">

                <label for="quantidade">Quantidade em Estoque</label>
                <input type="number" id="quantidade" name="quantidade" value="<?= $dados['estoque'] ?? '' ?>" min="0" required>

                <label for="disponibilidade">Disponibilidade</label>
                <select id="disponibilidade" name="disponibilidade" required>
                    <?php $dispAtual = $dados['disponivel'] ?? 1; ?>
                    <option value="disponivel" <?= $dispAtual ? 'selected' : '' ?>>Disponível</option>
                    <option value="indisponivel" <?= !$dispAtual ? 'selected' : '' ?>>Indisponível</option>
                </select>

                <div>
                    <button type="submit" id="btn-salvar">Salvar Alterações</button>
                    <a href="admin-estoque.php"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>
        </section>
    </main>
    </div>
</body>
</html>
