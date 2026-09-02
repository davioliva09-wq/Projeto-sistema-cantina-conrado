<?php
//ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../routes/conexao.php';
require_once __DIR__ . '/../models/usuario.php';

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"] ?? '';

    $usuarioClasse = new UsuarioComum($conn);
    $resultado = $usuarioClasse->login($email, $senha);

    if ($resultado) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['usuario_id'] = $resultado['id'];
        
        header("Location: catalogo.php");
        exit();
    } else {
        $mensagemErro = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">

    <title>Login - Cantina Conrado</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

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

        .erro-login {
            color: #ff3333;
            background-color: #ffe6e6;
            padding: 8px;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <?php require_once("header.php"); ?>

    <main>
        <section>
            <h1>Usuário</h1>

            <?php if (!empty($mensagemErro)): ?>
                <div class="erro-login"><?php echo $mensagemErro; ?></div>
            <?php endif; ?>

            <form action="catalogo.php" method="POST">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Senha" required>

                <button type="submit">Login</button>
            </form>

            <a href="rec-senha.php">Esqueci a senha</a>
            <a href="cadastro.php">Primeiro acesso</a>
        </section>
    </main>

    <footer>
        <nav>
            <a href="privacidade.php">Políticas de Privacidade</a>
            <a href="termos.php">Termos de Uso</a>
        </nav>
        <p>© 2026 Escola Padre Conrado C. Silva Alves | Todos os direitos reservados.</p>
    </footer>

</body>
</html>
