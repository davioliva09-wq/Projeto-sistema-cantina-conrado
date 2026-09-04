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
    <link rel="stylesheet" href="../../style.css">
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
body
    {
        background-color: #d3d3d3
    }

</style>

<header> 
    <div> 
        <a href="../views/admin-pedidos.php"> 
            <img class="smolpng" src="images/logo.png" alt="Cantina Conrado"> 
            <h2 id="title">Cantina<br>Conrado</h2> 
        </a> 
    </div> 

    <div style="display: flex; align-items: center;">
        <img src="images/user-neru.png" alt="login" style="width: 25px; height: auto; margin-right: 10px;">
        <nav>
         <a href="perfil-admin.php" class="span-intro">Meu Perfil </a> 
        </nav>
    </div> 
</header>
