
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cantina Conrado - Configurações.</title>


    <!-- Importação de ícones externos (Font Awesome) -->
    <link rel="stylesheet" href="https://cloudflare.com">


    <!-- Importação de fontes -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap"
        rel="stylesheet"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
        rel="stylesheet"
    >


    <!-- Vínculo com o arquivo externo CSS -->

    <link rel="stylesheet" href="css/perfil-aluno.css">


    <!-- =====================================================
         AJUSTES DOS CAMPOS DE TELEFONE
    ====================================================== -->

    <style>

        /* =========================================================
           PERSONALIZAÇÃO RÁPIDA DA PÁGINA
           ---------------------------------------------------------
           Altere aqui quando precisar ajustar somente esta tela.
        ========================================================= */

        :root {
            --cor-amarelo: #ffd000;
            --cor-fundo-input: #071a40;
            --espaco-botoes: 12px;
        }


        /* =========================================================
           TELEFONE
           ---------------------------------------------------------
           55 = código do país (fixo)
           DDD = campo separado
           Número = campo principal
        ========================================================= */

        .phone-fields {
            display: flex !important;
            gap: 12px !important;
            align-items: center !important;
            width: 100% !important;
        }

        /* Código do país: 55 */
        .phone-fields > .input-container:nth-child(1) {
            width: 85px !important;
            min-width: 85px !important;
            max-width: 85px !important;
            flex: 0 0 85px !important;
        }

        .phone-fields > .input-container:nth-child(1) input {
            width: 100% !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
            text-align: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* DDD */
        .phone-fields > .input-container:nth-child(2) {
            width: 100px !important;
            min-width: 100px !important;
            max-width: 100px !important;
            flex: 0 0 100px !important;
        }

        .phone-fields > .input-container:nth-child(2) input {
            width: 100% !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
            text-align: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* Número do telefone */
        .phone-fields > .input-container:nth-child(3) {
            width: auto !important;
            min-width: 0 !important;
            flex: 1 1 auto !important;
        }

        .phone-fields > .input-container:nth-child(3) input {
            width: 100% !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
        }


        /* =========================================================
           DADOS DA CONTA
           ---------------------------------------------------------
           Cargo preparado para futuramente receber valor automático.
        ========================================================= */

        


        /* =========================================================
           FOTO E IDENTIFICAÇÃO
           ---------------------------------------------------------
           Foto, tag e espaçamento da coluna direita.
        ========================================================= */

        .avatar-side {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .avatar-title {
            margin-bottom: 12px;
        }

        .avatar-wrapper {
            position: relative;
            display: block;
            width: 180px !important;
            height: 180px !important;
            max-width: 180px !important;
            margin: 0 auto;
            padding: 0 !important;
            background: transparent !important;
            border: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            overflow: visible !important;
        }

        .avatar-img {
            display: block !important;
            width: 180px !important;
            height: 180px !important;
            min-width: 180px !important;
            min-height: 180px !important;
            max-width: 180px !important;
            max-height: 180px !important;
            margin: 0 auto !important;
            padding: 0 !important;
            border-radius: 50% !important;
            object-fit: cover !important;
            object-position: center !important;
            box-sizing: border-box !important;
            aspect-ratio: 1 / 1 !important;
            background: transparent !important;
        }

        /* Botão de editar perfil: somente o ícone de lápis */
        .btn-edit-profile {
            position: absolute !important;
            right: -4px !important;
            bottom: -4px !important;
            z-index: 10 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 40px !important;
            height: 40px !important;
            margin: 0 !important;
            padding: 0 !important;
            border: 2px solid var(--cor-amarelo) !important;
            border-radius: 50% !important;
            background-color: var(--cor-fundo-input) !important;
            color: var(--cor-amarelo) !important;
            font-family: 'Fredoka', sans-serif !important;
            font-size: 17px !important;
            line-height: 1 !important;
            cursor: pointer !important;
            box-sizing: border-box !important;
        }

        .btn-edit-profile:hover {
            opacity: 0.9;
        }

        .btn-edit-profile i {
            font-size: 18px;
            line-height: 1;
        }

        .admin-tag {
            display: none !important;
        }



        /* =========================================================
           BOTÕES DA CANTINA
           ---------------------------------------------------------
           Três botões com mesma largura/altura e espaçamento igual.
        ========================================================= */

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            gap: var(--espaco-botoes);
            margin-top: 14px;
        }

        .action-buttons .btn-yellow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            width: min(100%, 280px);
            height: 48px;
            min-height: 48px;
            max-height: 48px;
            padding: 0 16px;
            box-sizing: border-box;
            flex: 0 0 48px;
            background-color: var(--cor-amarelo);
            color: #071a40;
            border: none;
            border-radius: 12px;
            font-family: 'Fredoka', sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 1;
        }

        /* BOTÃO SAIR: força o mesmo corpo visual dos outros botões */
        .action-buttons button.btn-yellow {
            appearance: none !important;
            -webkit-appearance: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: min(100%, 280px) !important;
            height: 52px !important;
            min-height: 52px !important;
            max-height: 52px !important;
            padding: 0 16px !important;
            margin: 0 !important;
            box-sizing: border-box !important;
            flex: 0 0 52px !important;
            background-color: var(--cor-amarelo) !important;
            color: #071a40 !important;
            border: none !important;
            border-radius: 12px !important;
            font-family: 'Fredoka', sans-serif !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 1 !important;
            cursor: pointer;
        }

        .action-buttons button.btn-yellow i {
            margin: 0 !important;
        }

        .action-buttons .btn-yellow i {
            font-size: 18px;
        }

        /* =========================================================
           ANIMAÇÃO DOS BOTÕES
           ---------------------------------------------------------
           Ao passar o mouse, o botão sobe levemente e ganha sombra.
           Ao clicar, ele dá uma pequena "pressionada".
        ========================================================= */

        .action-buttons .btn-yellow {
            transition:
                transform 0.18s ease,
                box-shadow 0.18s ease,
                background-color 0.18s ease;
            cursor: pointer;
        }

        .action-buttons .btn-yellow:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
            background-color: #ffe04a;
        }

        .action-buttons .btn-yellow:active {
            transform: translateY(1px) scale(0.98);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Ícone também acompanha a animação */
        .action-buttons .btn-yellow i {
            transition: transform 0.18s ease;
        }

        .action-buttons .btn-yellow:hover i {
            transform: scale(1.12);
        }

        /* =========================================================
           BOTÃO SAIR DA CONTA
           ---------------------------------------------------------
           Cria um espaço maior entre "Gerenciar Cardápio" e
           "Sair da conta", deixando o botão mais para baixo.
        ========================================================= */



        /* Botão Sair da conta no rodapé */
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .card-footer .btn-yellow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 240px;
            height: 48px;
            padding: 0 16px;
            box-sizing: border-box;
            background-color: var(--cor-amarelo);
            color: #071a40;
            border: none;
            border-radius: 12px;
            font-family: 'Fredoka', sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
        }

        .card-footer .btn-yellow:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
            background-color: #ffe04a;
        }

        .card-footer .btn-yellow:active {
            transform: translateY(1px) scale(0.98);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .card-footer .btn-yellow i {
            font-size: 18px;
            transition: transform 0.18s ease;
        }

        .card-footer .btn-yellow:hover i {
            transform: scale(1.12);
        }

        /* =========================================================
           RESPONSIVIDADE
           ---------------------------------------------------------
           Ajustes para telas pequenas.
        ========================================================= */

        @media (max-width: 600px) {

            .phone-fields {
                gap: 8px !important;
            }

            .phone-fields > .input-container:nth-child(1) {
                width: 70px !important;
                min-width: 70px !important;
                max-width: 70px !important;
                flex-basis: 70px !important;
            }

            .phone-fields > .input-container:nth-child(2) {
                width: 75px !important;
                min-width: 75px !important;
                max-width: 75px !important;
                flex-basis: 75px !important;
            }

            .action-buttons .btn-yellow {
                width: min(100%, 280px);
            }

            .card-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-footer .btn-yellow {
                width: min(100%, 280px);
            }

        }



        /* =========================================================
           RESPONSIVIDADE PARA CELULAR
           ---------------------------------------------------------
           Ajusta a página para telas pequenas sem alterar o visual
           da versão para computador.
        ========================================================= */

        @media (max-width: 600px) {

            body {
                width: 100%;
                min-width: 0;
                overflow-x: hidden;
                box-sizing: border-box;
            }

            .container {
                width: 100%;
                max-width: 100%;
                margin: 0;
                padding: 12px;
                box-sizing: border-box;
            }

            .header-logo {
                width: 100%;
                max-width: 100%;
                margin: 10px auto 18px;
                justify-content: center;
                box-sizing: border-box;
            }

            .logo-icon img {
                max-width: 75px;
                height: auto;
            }

            .brand-name {
                font-size: 28px;
                line-height: 0.95;
            }

            .card-config {
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                padding: 22px 16px;
                box-sizing: border-box;
                border-radius: 14px;
            }

            .card-title {
                font-size: 30px;
                margin-bottom: 24px;
            }

            .content-layout {
                display: flex !important;
                flex-direction: column !important;
                width: 100%;
                gap: 28px;
                box-sizing: border-box;
            }

            .form-side,
            .avatar-side {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box;
            }

            .input-group {
                width: 100%;
                box-sizing: border-box;
            }

            .input-container {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }

            .input-container input {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }

            .phone-fields {
                width: 100% !important;
                gap: 8px !important;
                box-sizing: border-box;
            }

            .phone-fields > .input-container:nth-child(1) {
                width: 62px !important;
                min-width: 62px !important;
                max-width: 62px !important;
                flex: 0 0 62px !important;
            }

            .phone-fields > .input-container:nth-child(2) {
                width: 70px !important;
                min-width: 70px !important;
                max-width: 70px !important;
                flex: 0 0 70px !important;
            }

            .phone-fields > .input-container:nth-child(3) {
                width: auto !important;
                min-width: 0 !important;
                flex: 1 1 auto !important;
            }

            .avatar-side {
                align-items: center;
            }

            .avatar-wrapper {
                width: 150px !important;
                height: 150px !important;
            }

            .avatar-img {
                width: 150px !important;
                height: 150px !important;
                min-width: 150px !important;
                min-height: 150px !important;
                max-width: 150px !important;
                max-height: 150px !important;
            }

            .action-buttons {
                width: 100%;
                margin-top: 18px;
            }

            .action-buttons .btn-yellow {
                width: min(100%, 280px) !important;
                height: 48px !important;
                min-height: 48px !important;
                max-height: 48px !important;
                flex: 0 0 48px !important;
            }

            .card-footer {
                width: 100%;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 14px;
                box-sizing: border-box;
            }

            .card-footer .btn-back,
            .card-footer .btn-yellow {
                width: min(100%, 280px) !important;
                box-sizing: border-box;
            }

            .card-footer .btn-yellow {
                height: 48px !important;
                min-height: 48px !important;
                max-height: 48px !important;
            }
        }

        @media (max-width: 380px) {

            .container {
                padding: 8px;
            }

            .card-config {
                padding: 18px 12px;
            }

            .card-title {
                font-size: 26px;
            }

            .brand-name {
                font-size: 24px;
            }

            .phone-fields {
                gap: 5px !important;
            }

            .phone-fields > .input-container:nth-child(1) {
                width: 55px !important;
                min-width: 55px !important;
                max-width: 55px !important;
                flex-basis: 55px !important;
            }

            .phone-fields > .input-container:nth-child(2) {
                width: 62px !important;
                min-width: 62px !important;
                max-width: 62px !important;
                flex-basis: 62px !important;
            }

            .avatar-wrapper {
                width: 135px !important;
                height: 135px !important;
            }

            .avatar-img {
                width: 135px !important;
                height: 135px !important;
                min-width: 135px !important;
                min-height: 135px !important;
                max-width: 135px !important;
                max-height: 135px !important;
            }
        }
        /* AJUSTE FINAL PARA CELULAR: ocupa melhor a largura da tela */
        @media (max-width: 600px) {
            html,
            body {
                width: 100% !important;
                min-width: 0 !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                overflow-x: hidden !important;
            }

            .container {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                margin: 0 !important;
                padding: 10px !important;
                box-sizing: border-box !important;
            }

            .card-config {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                margin: 0 !important;
                padding: 20px 14px !important;
                box-sizing: border-box !important;
            }

            .content-layout,
            .form-side,
            .avatar-side,
            .input-group,
            .input-container {
                min-width: 0 !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
            }

            .input-container input {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
                font-size: 15px !important;
            }

            .phone-fields {
                width: 100% !important;
                max-width: 100% !important;
                gap: 7px !important;
                box-sizing: border-box !important;
            }

            .phone-fields > .input-container:nth-child(1) {
                width: 58px !important;
                min-width: 58px !important;
                max-width: 58px !important;
                flex: 0 0 58px !important;
            }

            .phone-fields > .input-container:nth-child(2) {
                width: 68px !important;
                min-width: 68px !important;
                max-width: 68px !important;
                flex: 0 0 68px !important;
            }

            .phone-fields > .input-container:nth-child(3) {
                width: auto !important;
                min-width: 0 !important;
                flex: 1 1 auto !important;
            }

            .phone-fields input {
                padding-left: 8px !important;
                padding-right: 8px !important;
                font-size: 14px !important;
            }

            .action-buttons .btn-yellow,
            .card-footer .btn-yellow,
            .card-footer .btn-back {
                width: 100% !important;
                max-width: 280px !important;
                box-sizing: border-box !important;
            }
        }

        @media (max-width: 380px) {
            .container {
                padding: 6px !important;
            }

            .card-config {
                padding: 18px 10px !important;
            }

            .phone-fields {
                gap: 5px !important;
            }

            .phone-fields > .input-container:nth-child(1) {
                width: 52px !important;
                min-width: 52px !important;
                max-width: 52px !important;
                flex-basis: 52px !important;
            }

            .phone-fields > .input-container:nth-child(2) {
                width: 62px !important;
                min-width: 62px !important;
                max-width: 62px !important;
                flex-basis: 62px !important;
            }

            .phone-fields input {
                padding-left: 5px !important;
                padding-right: 5px !important;
                font-size: 13px !important;
            }
        }


    </style>

</head>


<body>

    <div class="container">


        <!-- =========================================================
             1. CABEÇALHO / LOGO
             ---------------------------------------------------------
             Para trocar a logo: altere o src de images/logo.png.
        ========================================================= -->

        <header class="header-logo">

            <div class="logo-icon">

                <img
                    src="images/logo.png"
                    alt="Uwu"
                >

            </div>


            <h1 class="brand-name">

                Cantina<br>Conrado

            </h1>

        </header>



        <!-- =========================================================
             2. PAINEL PRINCIPAL DA CONTA
        ========================================================= -->

        <main class="card-config">

            <h2 class="card-title">

                Configurações

            </h2>



            <div class="content-layout">


                <!-- =================================================
                     COLUNA ESQUERDA: FORMULÁRIO
                ================================================== -->

                <section class="form-side" id="dados-conta">


                    <!-- CAMPO NOME -->

                    <div class="input-group">

                        <label for="nome">

                            Nome completo

                        </label>


                        <div class="input-container">

                            <i class="fa-solid fa-user"></i>


                            <input
                                type="text"
                                id="nome"
                                placeholder="Digite seu nome completo"
                            >

                        </div>

                    </div>



                    <!-- CAMPO EMAIL -->

                    <div class="input-group">

                        <label for="email">

                            Email

                        </label>


                        <div class="input-container">

                            <i class="fa-solid fa-envelope"></i>


                            <input
                                type="email"
                                id="email"
                                placeholder="email@email.com"
                            >

                        </div>

                    </div>



                    <!-- =================================================
                         CAMPO TELEFONE
                    ================================================== -->

                    <div class="input-group">

                        <label>

                            Telefone

                        </label>


                        <div class="phone-fields">


                            <!-- =================================================
                                 CÓDIGO DO PAÍS - 55
                            ================================================== -->

                            <div class="input-container">

                                <input
                                    type="text"
                                    value="55"
                                    class="codigo-pais"
                                    readonly
                                >

                            </div>



                            <!-- =================================================
                                 DDD - 11
                            ================================================== -->

                            <div class="input-container">

                                <i class="fa-solid fa-phone"></i>


                                <input
                                    type="tel"
                                    class="ddd-input"
                                    placeholder="11"
                                    maxlength="2"
                                    inputmode="numeric"

                                    oninput="
                                        this.value = this.value
                                            .replace(/\D/g, '')
                                            .slice(0, 2);
                                    "
                                >

                            </div>



                            <!-- =================================================
                                 NÚMERO DO TELEFONE
                                 99999-9999
                            ================================================== -->

                            <div
                                class="input-container"
                                style="flex: 1;"
                            >

                                <input
                                    type="tel"
                                    placeholder="99999-9999"
                                    maxlength="10"
                                    inputmode="numeric"

                                    oninput="
                                        this.value = this.value
                                            .replace(/\D/g, '')
                                            .slice(0, 9)
                                            .replace(/(\d{5})(\d)/, '$1-$2');
                                    "
                                >

                            </div>


                        </div>

                    </div>


                    <!-- CAMPO 4 - CARGO DO USUÁRIO -->

                    <div class="input-group">

                        <label for="cargo">

                            Cargo

                        </label>


                        <div class="input-container">

                            <i class="fa-solid fa-user-shield"></i>

                            <input
                                type="text"
                                id="cargo"
                                value="Cantina"
                                readonly
                            >

                        </div>

                    </div>

                </section>



                <!-- =================================================
                     COLUNA DIREITA: AVATAR E BOTÕES
                ================================================== -->

                <section class="avatar-side" id="acoes-cantina">
<h3 class="avatar-title">

                        Foto de perfil

                    </h3>


                    <div class="avatar-wrapper">


                        <img
                            src="images/kibe.jpg"
                            class="avatar-img"
                            alt="Foto de perfil da cantina"
                        >



                        <button
                            type="button"
                            class="btn-edit-profile"
                            title="Editar foto de perfil"
                            aria-label="Editar foto de perfil"
                            onclick="editarFotoPerfil()"
                        >
                            <i class="fa-solid fa-pencil" aria-hidden="true"></i>
                        </button>

                    </div>



                    <div class="action-buttons" id="botoes-cantina">


                        <a
                            href="vendas.php"
                            class="btn-yellow"
                        >

                            <i class="fa-solid fa-chart-column"></i>

                            Gerenciar Vendas

                        </a>


                        <a
                            href="cardapio.php"
                            class="btn-yellow"
                        >

                            <i class="fa-solid fa-clipboard-list"></i>

                            Gerenciar Cardápio

                        </a>




                    </div>


                </section>


            </div>



            <!-- =================================================
                 RODAPÉ DO CARD
            ================================================== -->

            <footer class="card-footer">


                <a
                    href="admin-pedidos.php"
                    class="btn-back"
                >


                    <img
                        src="https://cdn.creazilla.com/icons/3213492/arrow-left-icon-lg.png"
                        alt="voltar"
                        class="seta-img"
                    >


                    Voltar


                </a>

                <button type="button" class="btn-yellow btn-logout-footer">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair da conta
                </button>


            </footer>


        </main>


    </div>



    <script>
        function editarFotoPerfil() {
            alert('Editar foto de perfil');
        }
    </script>

</body>

</html>




