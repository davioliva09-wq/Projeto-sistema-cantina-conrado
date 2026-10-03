<?php

require_once("conexao.php"); // Instancia a variável $conexao
require_once("ADM.php");     // Altere para o nome correto do seu arquivo da classe ADM

$admObj = new ADM($conexao);

require_once("models/conexao.php"); // Instancia a variável $conexao
require_once("models/admin.php");     // Altere para o nome correto do seu arquivo da classe ADM
require_once("models/produtos.php");
$admObj = new Produto($conn);
$produtos = $admObj->listarProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Cantina Conrado</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9;">

    <?php require_once("header.php"); ?>

    <main style="display: flex; justify-content: center; width: 100%; margin-top: 30px; box-sizing: border-box; padding: 0 20px;">
        <div style="width: 100%; max-width: 1200px;">
            
            <h2 style="text-align: center; color: #222222; margin-bottom: 30px; text-transform: uppercase; font-size: 1.5rem; letter-spacing: 0.5px;">
                Nossos Produtos
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; width: 100%;">
                
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        
                        <!-- Card Individual -->
                        <div style="background-color: #ffffff; border-radius: 12px; border: 1px solid #eeeeee; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); overflow: hidden; display: flex; flex-direction: column;">
                            
                            <!-- Imagem do Produto -->
                            <img src="uploads/<?php echo htmlspecialchars($produto['imagem']); ?>" 
                                 alt="<?php echo htmlspecialchars($produto['nome']); ?>" 
                                 style="width: 100%; height: 180px; object-fit: cover; background-color: #f5f5f5;">
                            
                            <!-- Corpo de Informações -->
                            <div style="padding: 15px; display: flex; flex-direction: column; flex-grow: 1;">
                                
                                <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #e74c3c; margin-bottom: 5px;">
                                    <?php echo htmlspecialchars($produto['categoria']); ?>
                                </span>
                                
                                <h3 style="font-size: 1.2rem; color: #333333; margin: 0 0 8px 0;">
                                    <?php echo htmlspecialchars($produto['nome']); ?>
                                </h3>
                                
                                <p style="font-size: 0.9rem; color: #666666; line-height: 1.4; margin: 0 0 15px 0;">
                                    <?php echo htmlspecialchars($produto['descricao']); ?>
                                </p>
                                
                                <!-- Rodapé do Card (Preço e Estoque) -->
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 10px; border-top: 1px dashed #eeeeee;">
                                    
                                    <span style="font-size: 1.25rem; font-weight: 700; color: #2ecc71;">
                                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                    </span>
                                    
                                    <span style="font-size: 0.8rem; color: #999999; background-color: #f9f9f9; padding: 4px 8px; border-radius: 4px;">
                                        Qtd: <?php echo $produto['estoque']; ?>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="grid-column: 1 / -1; text-align: center; color: #999999; font-size: 1.1rem; margin-top: 20px;">
                        Nenhum produto cadastrado no momento.
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </main>

</body>
</html>
