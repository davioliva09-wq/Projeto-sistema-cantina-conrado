<?php


//Everton392@

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'conexao.php';
require_once 'admin.php';

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"] ?? '';
    $tipoForm = $_POST["tipo"] ?? 'usuario';

    $usuarioClasse = new UsuarioComum($conn);
    $usuarioADMClasse = new ADM($conn);

    if ($tipoForm === 'admin') {
        $resultado = $usuarioADMClasse->loginAdm($email, $senha);

        if ($resultado) {
            session_start();
            $_SESSION['usuario_id'] = $resultado['id'];
            $_SESSION['usuario_tipo'] = 'admin';
            header("Location: admin-relatorio.php");
            exit;
        } else {
            $mensagemErro = "E-mail/Senha incorretos ou você não é um Administrador.";
        }
    } else {
        $resultado = $usuarioClasse->login($email, $senha);

        if ($resultado) {
            session_start();
            $_SESSION['usuario_id'] = $resultado['id'];
            $_SESSION['usuario_tipo'] = 'comum';
            header("Location: catalogo.php");
            exit;
        } else {
            $mensagemErro = "E-mail ou senha incorretos.";
        }
    }
}
?>


<!--- Tela de login --->

<!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style.css">

        <title>Login - Cantina Conrado</title>

  <style>
            body {
    margin: 0;
    padding: 0;
}

           header {
            margin: 15px !important; /* Cria um espaço de 15px entre o header e a borda da tela */
    padding: 10px 20px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 15px;
    
    /* Adicione estas linhas: */
    margin: 10px 20px !important; /* 10px acima/abaixo e 20px nas laterais */
    /* background-color: #f0f0f0; /* Opcional: para ver o fundo do header afastado */
    border-radius: 8px; /* Opcional: arredonda os cantos se tiver fundo */
    width: auto !important; /* Impede que o arquivo externo force 100% de largura */
}

            /* Garante que o link interno do logo não quebre o alinhamento */
            header a {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                color: inherit;
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
         </header>


        <main>

            <section>

                <nav>
                    <a href="?tipo=usuario" class="login-select-btn">Usuário</a>
                    <a href="?tipo=admin" class="login-select-btn">Administrador</a>
                </nav>


                <?php

                $tipo = $_GET['tipo'] ?? 'usuario';

                ?>

                
                <?php if ($tipo === 'admin'): ?>



                    <h1>Administrador</h1>

                    <form action="login.php" method="POST">

                        <input
                            type="hidden"
                            name="tipo"
                            value="admin"
                        >

                        <label for="email">
                            E-mail
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="E-mail"
                            required
                        >


                        <label for="senha">
                            Senha
                        </label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Senha"
                            required
                        >


                        <button type="submit" class="btn">
                            Login
                        </button>

                    </form>

                    <a href="admin-rec-senha.php">
                        Esqueci a senha
                    </a>


                <?php else: ?>

                    <h1>Usuário</h1>

                    <form action="login.php" method="POST">

                        <input
                            type="hidden"
                            name="tipo"
                            value="usuario"
                        >

                        <label for="email">
                            E-mail
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="E-mail"
                            required
                        >


                        <label for="senha">
                            Senha
                        </label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Senha"
                            required
                        >

                        <button type="submit" class="btn">
                            Login
                        </button>

                    </form>

                    <a href="rec-senha.php">
                        Esqueci a senha
                    </a>

                    <a href="cadastro.php">
                        Primeiro acesso
                    </a>

                <?php endif; ?>

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