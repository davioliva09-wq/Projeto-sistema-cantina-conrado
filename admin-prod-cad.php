<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("cad-prod.php");
    
    header("Location: index.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cantina Conrado</title>
    <!-- Google Fonts — Importação Correta da Fonte Rammetto One -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <!-- Linkagem do seu arquivo CSS Local -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">
            <div id="title">
                <!-- Substitua pelo caminho real da sua imagem ou ícone -->
            <img class=smolpng src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado">
                <span>Cantina<br>Conrado</span>
            </div>
        </a>
        <nav>
            <a href="perfil-admin.html">Meu Perfil</a>
        </nav>
    </header>
    <div id="wrapper">
        <aside id="sidebar">
            <nav>
                <a href="dashboard.html">Dashboard</a>
                <a href="produtos.html" class="ativo">Produtos</a>
                <a href="pedidos.html">Pedidos</a>
                <a href="usuarios.html">Usuários</a>
            </nav>
        </aside>
        <main>
            <section>
                <!-- Formulário puro pronto para estilização -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_produto" value="">
                    
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" placeholder="Ex: X-Burguer" required>
                    
                    <div id="linha-preco-estoque">
                        <div>
                            <label for="preco">Preço</label>
                            <input type="number" id="preco" name="preco" step="0.01" min="0" placeholder="0,00" required>
                        </div>
                        <div>
                            <label for="estoque">Estoque</label>
                            <input type="number" id="estoque" name="estoque" min="0" placeholder="0" required>
                        </div>
                    </div>
                    
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" required>
                        <option value="" selected disabled>Selecione:</option>
                        <option value="lanches">Lanches</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="doces">Doces</option>
                        <option value="salgados">Salgados</option>
                    </select>
                    
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="6"></textarea>
                    
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*">
                    
                    <div id="linha-botoes">
                        <button type="submit" id="btn-salvar">Salvar Produto</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
