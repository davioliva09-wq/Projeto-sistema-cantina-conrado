<?php ?>
<head>
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link href="https://googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    header {
        background-color: #040227;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
    }

    header div a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: white;
        font-family: "Rammetto One";
    }

    .smolpng {
        height: 65px;
        margin-right: 10px;
    }

    header nav a {
        color: white;
        text-decoration: none;
    }

    .acoes-direita {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .btn-carrinho img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        background-color: white;
        transition: transform 0.2s;
    }

    .btn-carrinho img:hover {
        transform: scale(1.08);
    }

    @media screen and (max-width: 768px) {
        header {
            flex-wrap: wrap;
            gap: 15px;
        }
        header > div:first-child {
            flex: 1 1 100%;
        }
        #title {
            font-size: 25px;
        }
    }
</style>

<header>
    <div>
        <a href="../views/catalogo.php">
            <img class="smolpng" src="images/logo.png" alt="Cantina Conrado">
            <h2 id="title">Cantina<br>Conrado</h2>
        </a>
    </div>

    <div class="acoes-direita">
        <a href="carrinho-usuario.php" class="btn-carrinho" title="Meu Carrinho">
            <img src="images/carrinho.jpg" alt="carrinho">
        </a>

        <a href="http://localhost:8501" target="_blank" style="display: inline-flex; align-items: center; gap: 12px; padding: 8px 18px; background-color: #0b0e36; color: #ffae00; text-decoration: none; border-radius: 50px; border: 2px solid #ffae00; font-family: sans-serif; font-weight: bold; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
            <img src="images/conradoGPT.jpg" alt="ConradoGPT" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; background-color: white;">
            <span>ConradoGPT</span>
        </a>

        <div style="display: flex; align-items: center;">
            <img src="images/user-neru.png" alt="login" style="width: 25px; height: auto; margin-right: 10px;">
            <nav>
                <a href="perfil-aluno.php" class="span-intro">Meu Perfil</a>
            </nav>
        </div>
    </div>
</header>
