<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    
    <!-- Arquivos CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <main style="position: relative; overflow: hidden;">
        
        <!-- Seção de Introdução / Boas-vindas -->
        <section class="section-index">
            <p style="color: #ffa805; font-family: 'Fredoka', sans-serif; font-weight: 600; font-size: 20px;">
                BEM VINDO(A)!
            </p>
            
            <h1 class="intro" style="font-size: 70px;">
                Sua fome não espera, <br> 
                <span class="span-intro">a gente facilita!</span>
            </h1>
            
            <p>
                Com o Sistema de Cantina Conrado, você consulta o <br> 
                cardápio, faz seus pedidos e acompanha suas compras <br> 
                de forma rápida, prática e sem filas.
            </p>
            
            <button class="btn-intro">
                <a href="cadastro.php" style="color: navy; text-decoration: none;">CADASTRE-SE JÁ!</a>
            </button>
            
            <div style="display: flex; align-items: center; margin-top: 15px;">
                <img src="images/miku-lock.png" alt="Cadeado de segurança" style="width: 15px; height: auto; margin-right: 5px;">
                <p class="text-intro">
                    Cadastro exclusivo para alunos, responsáveis, e funcionários.
                </p>
            </div>
        </section>

        <!-- Seção da Imagem dos Lanches -->
        <section class="lanches-index">
            <img src="images/indexlanchitos.png" alt="Lanches saborosos da cantina">
        </section>

        <!-- Elementos Visuais de Fundo (Círculos) -->
        <div class="circle-superior-direito"></div>
        <div class="circle-inferior-esquerdo"></div>

    </main>

    <?php require_once 'footer.php'; ?>

</body>
</html>
