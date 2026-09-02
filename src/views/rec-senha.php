<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->
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

        <header class="logo-header">
            <a href="index.php">
                <img class="logo-img" src="../../images/logo.png" alt="Cantina Conrado">
                <h1 class="logo-text">Cantina<br>Conrado</h1>
            </a>
        </header>

    <!-- Painel (Reutilizado do Cadastro) -->

    <main class="card-cadastro">
        <h2 class="card-title">Recuperar Senha</h2>
        <hr class="divider">

        <p style="color: antiquewhite; margin-bottom: 20px;">Insira o E-mail e número cadastrado para receber o código de verificação.</p>
        <form  method="POST" action="password-reset.php">

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

        <button type="submit" class="btn-cadastrar" style="margin-top: 30px;">
            Enviar código
        </button>

        </form>

        </section>
    </main>

    </div>

    <?php include "footer.php" ?>
    
</body>
</html>