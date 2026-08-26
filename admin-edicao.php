<?php

// ID do produto que será editado.
// Futuramente, o Back-End poderá receber esse ID pela URL:
// admin-edicao.php?id=1

$produtoId = $_GET['id'] ?? 1;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Produto - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com"crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style-admin.css">

</head>


<body>

    <?php include "header.php" ?>


        <nav>

            <a href="perfil-admin.php">
                Meu Perfil
            </a>

        </nav>

    </header>


    <main>

        <section>

            <h1>Editar Produto</h1>


            <form
                action="#"
                method="POST"
                enctype="multipart/form-data"
            >

                <!-- ID do produto -->

                <input
                    type="hidden"
                    name="produto_id"
                    value="<?php echo $produtoId; ?>"
                >


                <!-- Nome -->

                <label for="nome">
                    Nome do Produto
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="X-Burguer"
                    required
                >


                <!-- Tipo -->

                <label for="tipo">
                    Tipo
                </label>

                <select
                    id="tipo"
                    name="tipo"
                    required
                >

                    <option value="lanches" selected>
                        Lanches
                    </option>

                    <option value="bebidas">
                        Bebidas
                    </option>

                    <option value="doces">
                        Doces
                    </option>

                    <option value="salgados">
                        Salgados
                    </option>

                </select>


                <!-- Descrição -->

                <label for="descricao">
                    Descrição
                </label>

                <textarea
                    id="descricao"
                    name="descricao"
                    rows="6"
                >Hambúrguer com queijo e molho especial.</textarea>


                <!-- Preço -->

                <label for="preco">
                    Preço
                </label>

                <input
                    type="number"
                    id="preco"
                    name="preco"
                    value="12.00"
                    step="0.01"
                    min="0"
                    required
                >


                <!-- Imagem -->

                <label for="imagem">
                    Alterar Imagem
                </label>
                <input type="file" id="imagem" name="imagem" accept="image/*">


                <!-- Estoque -->

                <label for="quantidade">
                    Quantidade em Estoque
                </label>
                <input type="number" id="quantidade" name="quantidade" value="15" min="0" required>


                <!-- Disponibilidade -->

                <label for="disponibilidade">
                    Disponibilidade
                </label>

                <select id="disponibilidade" name="disponibilidade" required>

                    <option value="disponivel" selected>
                        Disponível
                    </option>

                    <option value="indisponivel">
                        Indisponível
                    </option>

                </select>


                <!-- Botões -->

                <div>

                    <button type="submit">
                        Salvar Alterações
                    </button>

                    <button type="button" onclick="alert('Produto excluído!')">
                        Excluir Produto
                    </button>

                </div>

            </form>

        </section>

    </main>


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