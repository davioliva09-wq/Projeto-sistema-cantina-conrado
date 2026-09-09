
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

    <link rel="stylesheet" href="css/style-perfil.css">


    <!-- =====================================================
         AJUSTES DOS CAMPOS DE TELEFONE
    ====================================================== -->


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

                Portal<br>Administrativo

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
                            class="btn-edit-avatar"
                            title="Editar foto de perfil"
                            aria-label="Editar foto de perfil"
                        >
                            Editar
                            <i class="fa-solid fa-pencil" aria-hidden="true"></i>
                        </button>

                    </div>



                    <div class="action-buttons" id="botoes-cantina">


                        <a
                            href="admin-relatorio.php"
                            class="btn-yellow"
                        >

                            <i class="fa-solid fa-chart-column"></i>

                            Relatórios

                        </a>


                        <a
                            href="admin-estoque.php"
                            class="btn-yellow"
                        >

                            <i class="fa-solid fa-clipboard-list"></i>

                            Gerenciar Estoque

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

                <button type="button" class="btn-back btn-logout-footer">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair da conta
                </button>


            </footer>


        </main>


    </div>

</body>

</html>




