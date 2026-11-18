<?php 
// Código PHP (se necessário) pode entrar aqui
?> 

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
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
/* Estilos básicos para garantir o alinhamento correto */
header div a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: white; /* Ajuste a cor do texto conforme necessário */
    font-family: "Rammetto One";

}
.smolpng {
    height: 65px; /* Define um tamanho padrão para o ícone */
    margin-right: 10px;
}
header nav a {
    color: white;
    text-decoration: none;
}

@media screen and (max-width: 768px) {
    header {
        flex-wrap: wrap; /* Permite que os itens caiam para a próxima linha */
        gap: 15px;
    }
    
    /* Faz o bloco do Portal Administrativo ocupar toda a largura na primeira linha */
    header > div:first-child {
        flex: 1 1 100%; 
    }

    header > div:nth-child(2) {
        margin-left: 0;
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

    <div style="display: flex; align-items: center;">
    <a href="http://localhost:8501" target="_blank" style="display: inline-flex; align-items: center; gap: 12px; padding: 8px 18px; margin-right: 25px; background-color: #0b0e36; color: #ffae00; text-decoration: none; border-radius: 50px; border: 2px solid #ffae00; font-family: sans-serif; font-weight: bold; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
  <img src="images/conradoGPT.jpg" alt="ConradoGPT" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; background-color: white;">
  <span>ConradoGPT</span>
</a>


    <img src="images/user-neru.png" alt="login"  style="width: 25px; height: auto; margin-right: 10px;">
        <nav>
            <!-- Se estiver na pasta views, ajuste o caminho se necessário -->

         <a href="perfil-aluno.php" class="span-intro">Meu Perfil </a> 
        </nav>
    </div> 

    
</header>
