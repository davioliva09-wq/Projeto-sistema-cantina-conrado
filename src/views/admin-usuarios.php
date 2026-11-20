<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once '../routes/conexao.php'; 
require_once '../models/produtos.php'; 

$produtoService = new Produto($conn); 
$termoPesquisa = isset($_GET['q']) ? $_GET['q'] : ''; 
$produtos = $produtoService->buscaProdNome($termoPesquisa); 

// Filtra produtos que tenham estoque > 0 e (caso a coluna disponivel exista e seja usada) não estejam marcados como indisponíveis 
$produtosDisponiveis = array_filter($produtos, function($item) { 
    $temEstoque = isset($item['estoque']) && (int)$item['estoque'] > 0; 
    
    // Aceita se 'disponivel' não estiver definido, se for 1/true, ou se for a string 'disponivel' 
    $estaDisponivel = !isset($item['disponivel']) || $item['disponivel'] == 1 || $item['disponivel'] === true || $item['disponivel'] === 'disponivel'; 
    
    return $temEstoque && $estaDisponivel; 
});
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Usuários Cadastrados - Cantina Conrado</title> 
    <link rel="stylesheet" href="css/style.css"> 
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
                <a href="admin-relatorio.php">Relatórios</a> 
                <a href="admin-usuarios.php" class="ativo">Usuários</a> 
            </nav> 
        </aside> 
        
        <div class="conteudo-usuarios"> 
            <h1 style="color: var(--azul-marinho);">Usuários</h1> 
            <div class="barra-de-pesquisa"> 
                <form action="" method="get"> 
                    <input type="text" class="campo-busca" id="campo-busca" name="campo-busca" value="<?php echo htmlspecialchars($termoPesquisa); ?>" placeholder="Pesquisar usuário..."> 
                    <button type="submit">Enviar</button> 
                </form> 
            </div> 
            
            <table class="tabela"> 
                <thead> 
                    <tr> 
                        <th>ID</th> 
                        <th>Nome completo</th> 
                        <th>E-mail</th> 
                        <th>Telefone</th> 
                        <th>Status</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($usuarios)): ?> 
                        <tr>
                            <td colspan="5" style="text-align: center;">Nenhum estudante encontrado no momento!</td>
                        </tr>
                    <?php else: ?> 
                        <?php foreach ($usuarios as $user): ?> 
                            <tr> 
                                <td><?php echo htmlspecialchars($user['id'] ?? ''); ?></td> 
                                <td><?php echo htmlspecialchars($user['nome'] ?? ''); ?></td> 
                                <td><?php echo htmlspecialchars($user['email'] ?? ''); ?></td> 
                                <td><?php echo htmlspecialchars($user['telefone'] ?? ''); ?></td> 
                                <td><?php echo htmlspecialchars($user['status'] ?? ''); ?></td> 
                            </tr> 
                        <?php endforeach; ?> 
                    <?php endif; ?> 
                </tbody> 
            </table> 
        </div> 
    </div> 
</body> 
</html>
