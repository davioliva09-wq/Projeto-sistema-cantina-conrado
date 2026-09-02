<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../models/processar-cadastro.php';
    exit();
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once("processar-cadastro.php");
    header("location:login.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="../../css/style-cadastro.css">

</head>
<body>

    <div class="page-container">
        
        <!-- Logo da Cantina Conrado -->
        <header class="logo-header">
            <a href="index.php">
                <img class="logo-img" src="../../images/logo.png" alt="Cantina Conrado">
                <h1 class="logo-text">Cantina<br>Conrado</h1>
            </a>
        </header>

        <!-- Painel de Cadastro -->
        <main class="card-cadastro">
            <h2 class="card-title">Cadastro</h2>
            <hr class="divider">

            <form method="post" action="processar-cadastro.php">
                
                <!-- Nome -->
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <div class="input-with-icon">
                        <img src="../../images/user-neru.png" alt="Usuario">
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <img src="../../images/email-icon.png" alt="Email">
                        <input type="email" id="email" name="email" placeholder="email@email.com" required>
                    </div>
                </div>

                <!-- Telefone -->
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <div class="input-with-icon">
                        <img src="../../images/phone-icon.png" alt="telefoine">
                        <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    </div>
                </div>

                <!-- Senha -->
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-with-icon">
                        <img src="../../images/miku-lock.png" alt="senha">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <!-- Confirmar Senha -->
                <div class="form-group">
                    <label for="confirmar_senha">Confirmar senha</label>
                    <div class="input-with-icon">
                        <img src="../../images/miku-lock.png" alt="senha-again">
                        <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme sua senha" required>
                    </div>
                </div>

                <!-- Botão Enviar -->
                <button type="submit" class="btn-cadastrar">Cadastrar</button>

            </form>
        </main>
        
        <?php include "footer.php" ?>

    </div>

</body>
</html>
