<?php

require_once('conexao.php');
session_start();
class Usuario
{
    private $pdo;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->pdo = $conexao->exeCon();
    }

    public function logar($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email']; 
$senha = $_POST['senha']; 

$usuario = new Usuario();
$resultado = $usuario->logar($email, $senha); 
if($resultado){ 
        echo "certo";
    }else{
        echo "de ruim";
    }




    }
   

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <title>Login - Cantina Conrado</title>

</head>

<body>

    <header>

        <img
            class="smolpng"
            src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png"
            alt="Cantina Conrado"
        >

        <h2 id="title">
            Cantina<br>
            Conrado
        </h2>

    </header>


    <main>

        <section>

            <h1>Login</h1>

            <form action="" method="POST">

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


                <button type="submit">
                    Entrar
                </button>

            </form>

            <a href="#">
                Esqueci a senha
            </a>

            <a href="#">
                Primeiro acesso
            </a>

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