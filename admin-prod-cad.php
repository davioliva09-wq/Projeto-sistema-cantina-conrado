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
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* --- Estilização Avançada do Formulário (CSS Embutido Dedicado) --- */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fcf8f2; /* Tom off-white levemente quente */
        }

        /* Container do Formulário */
        main section {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(214, 111, 23, 0.06); /* Sombra suave quente */
            max-width: 650px;
            margin: 2rem auto;
            border: 1px solid #f1e4d3;
        }

        /* Título ou contexto visual para o formulário (Opcional) */
        main section::before {
            content: "🍔 Cadastro de Produto";
            display: block;
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 2rem;
            border-bottom: 2px dashed #f1e4d3;
            padding-bottom: 0.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        /* Labels e Inputs */
        label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #555;
            margin-bottom: -0.4rem;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2d8c9;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            color: #333;
            background-color: #fafafa;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
        }

        /* Efeito de foco inspirado nas cores do logo (Laranja/Amarelo sutil) */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #ff9f1c;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 159, 28, 0.15);
        }

        /* Alinhamento lado a lado (Preço e Estoque) */
        #linha-preco-estoque {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        #linha-preco-estoque > div {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        /* Área de Upload de Imagem Personalizada */
        input[type="file"] {
            padding: 10px;
            background: #fff8f0;
            border: 2px dashed #ffb703;
            border-radius: 10px;
            cursor: pointer;
            font-family: inherit;
        }

        /* Botão Salvar Estilizado */
        #linha-botoes {
            margin-top: 1rem;
            display: flex;
            justify-content: flex-end;
        }

        #btn-salvar {
            background-color: #ff9f1c; /* Laranja vivo do Hambúrguer */
            color: white;
            border: none;
            padding: 14px 32px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(255, 159, 28, 0.3);
        }

        #btn-salvar:hover {
            background-color: #e88c0e;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(255, 159, 28, 0.4);
        }

        #btn-salvar:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php">
            <div id="title">
                <!-- Mantida a imagem dinâmica enviada para o cabeçalho -->
                <img class="smolpng" src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado" width="50">
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
                <!-- Formulário estruturado com tratamento de multipart para a imagem -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_produto" value="">
                    
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" placeholder="Ex: X-Burguer" required>
                    
                    <div id="linha-preco-estoque">
                        <div>
                            <label for="preco">Preço (R$)</label>
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
                    
                    <label for="descricao">Descrição do Cardápio</label>
                    <textarea id="descricao" name="descricao" rows="4" placeholder="Detalhes dos ingredientes ou especificações do item..."></textarea>
                    
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
