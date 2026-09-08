<?php /*
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
*/
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=Poppins:wght@400;600&family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style-cadastro.css">
    <title>Login - Cantina Conrado</title>

    <style>
        /* Ajustes específicos da página de login que não estão no style-cadastro.css */
        .erro-login {
            color: #ffffff;
            background-color: rgba(255, 51, 51, 0.25);
            border: 1px solid #ff3333;
            padding: 10px;
            border-radius: 6px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
            font-size: 0.85rem;
            text-align: center;
        }

        .card-cadastro a {
            color: #e09304;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .card-cadastro a:hover {
            text-decoration: none;
        }

    </style>
</head>

<body>

    <div class="page-container">

        <header class="logo-header">
            <a href="index.php">
                <img src="images/logo.png" alt="Cantina Conrado" class="logo-img">
                <span class="logo-text">Cantina<br>Conrado</span>
            </a>
        </header>

        <main class="card-cadastro">
            <h1 class="card-title">Login</h1>
            <hr class="divider">

            <?php if (!empty($mensagemErro)): ?>
                <div class="erro-login"><?php echo $mensagemErro; ?></div>
            <?php endif; ?>

            <form action="catalogo.php" method="POST">

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <img src="images/email-icon.png" alt="">
                        <input type="email" id="email" name="email" placeholder="email@email.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-with-icon">
                        <img src="images/miku-lock.png" alt="">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <button type="submit" class="btn-cadastrar">Login</button>
            </form>

            <div class="login-links">
                <a href="rec-senha.php">Esqueci a senha</a>
                <a href="cadastro.php">Primeiro acesso</a>
            </div>
        </main>

    <?php include "footer.php" ?>

</body>
</html>