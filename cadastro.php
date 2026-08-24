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

        <!-- Google Font Links pro Rammeto One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

<style>
            
            header {
            margin: 15px !important; /* Cria um espaço de 15px entre o header e a borda da tela */
            padding: 10px 20px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 15px;
    
            /* Adicione estas linhas: */
            margin: 10px 20px !important; /* 10px acima/abaixo e 20px nas laterais */
            /* background-color: #f0f0f0; /* Opcional: para ver o fundo do header afastado */
            border-radius: 8px; /* Opcional: arredonda os cantos se tiver fundo */
            width: auto !important; /* Impede que o arquivo externo force 100% de largura */
            }

            /* Garante que o link interno do logo não quebre o alinhamento */
            header a {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                color: inherit;
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

            <h2 style="font-family: Rammetto One";>Cadastro</h2>

            <form method="post" action="processar-cadastro.php">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">

                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone">

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email">

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha">

                <label for="confirmar_senha">Confirmar senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha">

                <button type="submit" class="btn" style="margin-top: 20px;">Cadastrar</button>

            </form>

            <a href="login.php">Já possui uma conta? Entrar</a>

        </section>

    </main>

</body>

</html>