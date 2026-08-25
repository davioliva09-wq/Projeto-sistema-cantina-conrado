    <!--- Tela Inicial --->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado</title>

    <!-- Google Font Links pro Rammeto One-->

</head>

<body>

<?php include 'header.php'; ?>

    <main style="position: relative; overflow: hidden;">

        <section class="section-index">

            <p style="color: #ffa805; font-family: Fredoka; font-weight: 600; font-size: 20px;">
            BEM VINDO(A)!
            </p>



            <h1 class="intro" style="font-size: 70px;">
                Sua fome não espera,
                <br>
                <span class="span-intro">a gente facilita!</span>
            </h1>

            <p>
                Com o Sistema de Cantina Conrado, você consulta o <br>
                cardápio, faz seus pedidos e acompanha suas compras <br>
                de forma rápida, prática e sem filas.
            </p>

            <button class="btn-intro">
                <a href="cadastro.php" style="color:navy">
                  CADASTRE-SE JÁ!
                 </a>
            </button>

            <div style="display: flex; align-items: center; margin-top: 15px;">
                <img src="images/miku-lock.png" alt="cadeado UwU" style="width: 15px; height: auto; margin-right: 5px;">
                <p class="text-intro">
                Cadastro exclusivo para alunos, responsáveis,
                e funcionários.
                </p>
            </div>

        </section>

        <section class="lanches-index">

        <img src="images/indexlanchitos.png" alt="lanches gulosos">

        </section>

        <div class="circle-superior-direito"></div>
        <div class="circle-inferior-esquerdo"></div>


    </main>

    <?php include "footer.php" ?>

</body>
</html>