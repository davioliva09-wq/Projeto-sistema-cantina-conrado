<?php
require_once('conexao.php'); 

class Listar {
    private $pdo; 

    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public function listagem() {
        $query = "SELECT nome, email, senha FROM usuarios"; 
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


        $teste = new Listagem();
        $teste->listagem;

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


        <style>


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #fcf8f2;
    color: #333333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}

/* ==========================================
   HEADER (TOPO)
   ========================================== */
header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-top: 40px;
    margin-bottom: 20px;
}

header .smolpng {
    width: 60px;
    height: auto;
}

header #title {
    font-family: 'Rammetto One', sans-serif;
    color: #ff6b35;
    font-size: 1.8rem;
    line-height: 1.1;
    text-transform: uppercase;
}

/* ==========================================
   MAIN & SECTION (CARD DE LOGIN)
   ========================================== */
main {
    width: 100%;
    max-width: 400px;
    padding: 0 20px;
    margin-bottom: 40px;
}

section {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    border: 1px solid #f0e6df;
    text-align: center;
}

section h1 {
    font-size: 1.6rem;
    color: #2b2d42;
    margin-bottom: 25px;
    font-weight: 700;
}

/* ==========================================
   NAVEGAÇÃO DE ABAS (USUÁRIO / ADMIN)
   ========================================== */
nav {
    display: flex;
    background-color: #f0f0f0;
    padding: 5px;
    border-radius: 30px;
    margin-bottom: 25px;
}

nav a {
    flex: 1;
    text-decoration: none;
    padding: 10px 0;
    color: #666666;
    font-weight: 600;
    font-size: 0.95rem;
    border-radius: 25px;
    transition: all 0.3s ease;
}

/* Destaca a aba ativa baseada na URL atual (simulação visual simples) */
nav a:hover, 
nav a[href*="tipo=administrador"]:focus,
nav a[href*="tipo=usuario"]:focus {
    background-color: #ff6b35;
    color: #ffffff;
}

/* ==========================================
   FORMULÁRIOS E ENTRADAS
   ========================================== */
form {
    display: flex;
    flex-direction: column;
    text-align: left;
}

label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #555555;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px 16px;
    margin-bottom: 20px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    background-color: #fafafa;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #ffbb1c;
    background-color: #ffffff;
}

/* Botão de Envio */
button[type="submit"] {
    background-color: #ef476f;
    color: #ffffff;
    border: none;
    padding: 14px;
    font-size: 1.1rem;
    font-weight: 700;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 5px;
    margin-bottom: 20px;
    transition: background-color 0.2s ease, transform 0.1s ease;
}

button[type="submit"]:hover {
    background-color: #e03a60;
}

button[type="submit"]:active {
    transform: scale(0.98);
}

/* Links secundários do formulário (Esqueci a senha / Primeiro acesso) */
section a {
    display: inline-block;
    text-decoration: none;
    color: #0066cc;
    font-size: 0.85rem;
    margin: 5px 10px;
    transition: color 0.2s ease;
}

section a:hover {
    color: #004499;
    text-decoration: underline;
}

/* ==========================================
   FOOTER (RODAPÉ)
   ========================================== */
footer {
    width: 100%;
    background-color: #ffffff;
    padding: 20px;
    text-align: center;
    border-top: 1px solid #f0e6df;
    font-size: 0.8rem;
    color: #888888;
}

footer nav {
    background-color: transparent;
    justify-content: center;
    gap: 15px;
    margin-bottom: 10px;
    padding: 0;
}

footer nav a {
    flex: none;
    color: #666666;
    font-size: 0.8rem;
    font-weight: normal;
    padding: 0;
    border-radius: 0;
}

footer nav a:hover {
    background-color: transparent;
    color: #ef476f;
    text-decoration: underline;
}
            </style>
        <title>Login - Cantina Conrado</title>

    </head>

    <body>

        <header>

                <img class=smolpng src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado">
                <h2 id=title>Cantina<br>Conrado</h2>

        </header>


        <main>

            <section>

                <nav>
                    <a href="?tipo=usuario">Usuário</a>
                    <a href="?tipo=administrador">Administrador</a>
                </nav>


                <?php

                $tipo = $_GET['tipo'] ?? 'usuario';

                ?>


                <?php if ($tipo === 'administrador'): ?>

                    <h1>Administrador</h1>

                    <form action="login.php" method="POST">

                        <input
                            type="hidden"
                            name="tipo"
                            value="administrador"
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


                        <button type="submit">
                            Login
                        </button>

                    </form>

                    <a href="#">
                        Esqueci a senha
                    </a>

                    <a href="#">
                        Primeiro acesso
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


                        <button type="submit">
                            Login
                        </button>

                    </form>

                    <a href="#">
                        Esqueci a senha
                    </a>

                    <a href="#">
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