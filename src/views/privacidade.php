<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidade</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'index-header.php'; ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #08053f;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
        }

        /* CONTAINER PRINCIPAL */
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        /* CARD */
        .privacy-card {
            width: 660px;
            background-color: #050329;
            border-radius: 8px;
            padding: 50px 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
        }

        /* TÍTULO */
        .privacy-card h2 {
            font-family: "Fredoka";
            text-align: center;
            color: #ffa500;
            font-size: 30px;
            margin-bottom: 28px;
        }

        /* AVISO */
        .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 45px;
        }

        .notice-icon {
            width: 25px;
            height: 25px;
            min-width: 25px;
            border: 2px solid #ffa500;
            border-radius: 50%;
            color: #ffa500;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .notice p {
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            line-height: 1.35;
        }

        /* SEÇÕES */
        .section {
            margin-bottom: 42px;
        }

        .section h3 {
            color: #ffa500;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .section p {
            color: #ffffff;
            font-size: 18px;
            line-height: 1.35;
        }

        /* LISTA */
        .section ul {
            margin-top: 12px;
            padding-left: 25px;
        }

        .section li {
            color: #ffffff;
            font-size: 17px;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        /* RESPONSIVIDADE */
        @media (max-width: 700px) {

            header {
                height: 60px;
                padding: 0 20px;
            }

            header h1 {
                font-size: 23px;
            }

            .container {
                padding: 25px 12px;
            }

            .privacy-card {
                width: 100%;
                padding: 35px 22px;
            }

            .privacy-card h2 {
                font-size: 26px;
            }

            .section h3 {
                font-size: 20px;
            }

            .section p,
            .section li {
                font-size: 16px;
            }
        }
    </style>

    <main class="container">

        <div class="privacy-card">

            <h2>Política de Privacidade</h2>

            <div class="notice">
                <div class="notice-icon">!</div>

                <p style="font-family: Cascadia Code">
                    Esta Política de Privacidade explica como as
                    informações dos usuários são coletadas,
                    utilizadas e protegidas.
                </p>
            </div>

            <section class="section">
                <h3>1. Coleta de informações</h3>

                <p>
                    Podemos coletar informações fornecidas pelo
                    usuário durante o cadastro e utilização do
                    sistema, como nome, e-mail e outras informações
                    necessárias para o funcionamento dos serviços.
                </p>
            </section>

            <section class="section">
                <h3>2. Uso das informações</h3>

                <p>
                    As informações coletadas são utilizadas para
                    permitir o funcionamento do sistema, melhorar
                    nossos serviços, realizar comunicações e oferecer
                    uma experiência mais adequada aos usuários.
                </p>
            </section>

            <section class="section">
                <h3>3. Proteção dos dados</h3>

                <p>
                    Adotamos medidas técnicas e administrativas
                    destinadas a proteger as informações dos usuários
                    contra acessos não autorizados, alterações,
                    divulgação ou destruição indevida.
                </p>
            </section>

            <section class="section">
                <h3>4. Compartilhamento de informações</h3>

                <p>
                    As informações pessoais não serão compartilhadas
                    com terceiros, exceto quando necessário para o
                    funcionamento do serviço, cumprimento de obrigações
                    legais ou mediante autorização do usuário.
                </p>
            </section>

            <section class="section">
                <h3>5. Direitos do usuário</h3>

                <p>
                    O usuário pode solicitar informações sobre seus
                    dados pessoais, bem como solicitar correções ou
                    outras medidas previstas na legislação aplicável.
                </p>
            </section>

            <section class="section">
                <h3>6. Alterações nesta política</h3>

                <p>
                    Esta Política de Privacidade poderá ser atualizada
                    sempre que necessário. Recomendamos que os usuários
                    consultem esta página periodicamente para verificar
                    possíveis alterações.
                </p>
            </section>

        </div>

    </main>

        <?php include "footer.php" ?>

</body>

</html>