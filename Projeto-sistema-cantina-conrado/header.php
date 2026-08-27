<!-- header.php -->
 <style>
    header {
    display: flex;
    flex-direction: row;
    justify-content: space-between; /* Logo na esquerda, botão na direita */
    align-items: center;
    
    /* Espaçamentos externos e internos */
    margin: 15px 20px; 
    padding: 12px 24px;
    
    /* Visual moderno flutuante */
    background-color: #ffffff; 
    border-radius: 12px;
    border: 1px solid #eeeeee;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* Sombra sutil de profundidade */
}

 </style>
<header>
    <div>
        <a href="index.php" class="logo-link">
            <img class="smolpng" src="https://flaticon.com" alt="Cantina Conrado">
            <h2 id="title">Cantina<br>Conrado</h2>
        </a>
    </div>

    <nav>
        <a href="login.php?tipo=administrador" class="btn-login">Fazer login</a>
    </nav>
</header>
