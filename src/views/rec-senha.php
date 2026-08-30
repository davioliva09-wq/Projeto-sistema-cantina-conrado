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
    <link rel="stylesheet" href="style.css">
    
    <style>
            
            header {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 15px;
            }
    
            nav {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 15px;
            }


            main {
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 width: 100%;
                 margin-top: 30px;
            }

             section {
                 display: flex;
                 flex-direction: column;
                align-items: center;
                text-align: center;
                max-width: 400px;
                width: 100%;
            }

            form {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 12px;
                width: 100%;
                margin-top: 15px;
                margin-bottom: 15px;
            }


            input {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                }


            a {
                color: #ffffff; 
            }
            

        </style>


</head>


<body>

 <header>
        <div>
            <a href="index.php">
            <img class=smolpng src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado">
            <h2 id=title>Cantina<br>Conrado</h2>
            </a>
        </div>
    </header>

    <main>
        <section>
    
        <h2>Recuperar Senha</h2>

        <p>Insira o E-mail e número cadastrado para receber o código de verificação.</p>
        <form action="POST">

        <label for="rec-email">E-mail: </label>
        <input type="email" id="rec-email" name="rec-email">
        <label for="rec-numero">Número: </label>
        <input type="text" id="rec-email" name="rec-email">

        <button type="submit">Enviar código</button>

        </form>

        </section>
    </main>
    
</body>
</html>