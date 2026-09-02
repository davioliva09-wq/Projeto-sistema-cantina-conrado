<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cantina Conrado - Configurações</title>


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

    <link rel="stylesheet" href="../../css/perfil-aluno.css">


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
                            <i class="fa-solid fa-pencil"></i>
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


                        <button
                            type="button"
                            class="btn-yellow"
                        >

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Sair da conta

                        </button>


                    </div>


                </section>


            </div>



            <!-- =================================================
                 RODAPÉ DO CARD
            ================================================== -->

            <footer class="card-footer">


                <a
                    href="catalogo.php"
                    class="btn-back"
                >


                    <img
                        src="https://cdn.creazilla.com/icons/3213492/arrow-left-icon-lg.png"
                        alt="voltar"
                        class="seta-img"
                    >


                    Voltar


                </a>


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