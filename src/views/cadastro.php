<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../models/processar-cadastro.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        nav {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 30px;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        a {
            color: #ffffff; 
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <main>
        <section>
            <h2>Cadastro</h2>

            <form action="cadastro.php" method="POST">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <label for="confirmar_senha">Confirmar senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <button type="submit">Cadastrar</button>

            </form>

            <a href="login.php">Já possui uma conta? Entrar</a>
        </section>
    </main>

</body>
</html>
