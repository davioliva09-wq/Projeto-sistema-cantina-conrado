<!--- Tela de Produtos (Admin) --->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>

        body {
            background-color: #bfbdb8;
        }

    </style>

</head>

<body>

    <header>
        <div>
            <a href="index.php">
            <img class=smolpng src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado">
            <h2 id=title>Cantina<br>Conrado</h2>
            </a>
        </div>

        <nav>
            <a href="perfil-admin.php">Meu Perfil</a>
        </nav>
    </header>


    <div id="wrapper">

        <aside id="sidebar">

            <nav>

                <a href="dashboard.php">
                    Dashboard
                </a>

                <a href="produtos.php" class="ativo">
                    Produtos
                </a>

                <a href="pedidos.php">
                    Pedidos
                </a>

                <a href="usuarios.php">
                    Usuários
                </a>

            </nav>

        </aside>


        <main>

            <section>

                <form action="cad-prod.php" method="POST" enctype="multipart/form-data">

                    <input
                        type="hidden"
                        name="id_produto"
                        value=""
                    >

                    <label for="nome">
                        Nome do Produto
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Ex: X-Burguer"
                        required
                    >

                    <div id="linha-preco-estoque">

                        <div>
                            <label for="preco">
                                Preço
                            </label>

                            <input
                                type="number"
                                id="preco"
                                name="preco"
                                step="0.01"
                                min="0"
                                placeholder="0,00"
                                required
                            >
                        </div>

                        <div>
                            <label for="estoque">
                                Estoque
                            </label>

                            <input
                                type="number"
                                id="estoque"
                                name="estoque"
                                min="0"
                                placeholder="0"
                                required
                            >
                        </div>

                    </div>

                    <label for="categoria">
                        Categoria
                    </label>

                    <select id="categoria" name="categoria" required>
                        <option value="" selected disabled>Selecione:</option>
                        <option value="lanches">Lanches</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="doces">Doces</option>
                        <option value="salgados">Salgados</option>
                    </select>

                    <label for="descricao">
                        Descrição
                    </label>

                    <textarea
                        id="descricao"
                        name="descricao"
                        rows="6"
                    ></textarea>

                    <!-- O campo de imagem foi comentado temporariamente
                    <label for="imagem" id="area-imagem">
                        Adicionar Imagem
                    </label>

                    <input
                        type="file"
                        id="imagem"
                       name="imagem"
                        accept="image/*"
                    >
                    -->

                    <div id="linha-botoes">

                        <button type="submit" id="btn-salvar">
                            Salvar Produto
                        </button>

                        <button type="submit" name="acao" value="deletar" id="btn-deletar">
                            Deletar
                        </button>

                    </div>

                </form>

            </section>

        </main>

    </div>


    <footer>
        <nav>
            <a href="privacidade.php">
                Políticas de Privacidade
            </a>

            <a href="termos.php">
                Termos de Uso
            </a>
        </nav>

        <p>
            © 2026 Escola Padre Conrado C. Silva Alves |
            Todos os direitos reservados.
        </p>
    </footer>

</body>
</html>
