<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado - Configurações</title>
    
    <!-- Importação de ícones externos (Font Awesome) -->
    <link rel="stylesheet" href="https://cloudflare.com">
    
    <!-- Importação de fontes (Montserrat, Fredoka e Rammetto One) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">    

    <!-- Vínculo com o arquivo externo css -->
    <link rel="stylesheet" href="css/style-perfil.css">
</head>
<body>

    <div class="container">
        
        <!-- Topo: Logo e Nome -->
        <header class="header-logo">
            <div class="logo-icon">
             <img src="images/logo.png" alt="Uwu">
            </div>
            <h1 class="brand-name">Cantina<br>Conrado</h1>
        </header>

        <!-- Painel Central -->
        <main class="card-config">
            <h2 class="card-title">Configurações</h2>

            <div class="content-layout">
                
                <!-- Coluna Esquerda: Formulário -->
                <section class="form-side">
                    <!-- Campo Nome -->
                    <div class="input-group">
                        <label for="nome">Nome completo</label>
                        <div class="input-container">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="nome" placeholder="Digite seu nome completo">
                        </div>
                    </div>

                    <!-- Campo Email -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" placeholder="email@email.com">
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

                </section>

                <!-- Coluna Direita: Avatar e Botões -->
                <section class="avatar-side">
                    <h3 class="avatar-title">Foto de perfil</h3>
                    
                    <div class="avatar-wrapper">
                        <!-- Substitua o link abaixo pelo caminho ou link da sua imagem final -->
                        <img src="images/kibe.jpg"  class="avatar-img">
                        <button class="btn-edit-avatar">Editar</button>
                    </div>

                    <div class="action-buttons">
                        <a href="historico.php" class="btn-yellow">Histórico</a>
                    </div>
                </section>

            </div>

            <!-- Rodapé do Card -->
            <footer class="card-footer">
                <a href="catalogo.php" class="btn-back">
                    <img src="https://cdn.creazilla.com/icons/3213492/arrow-left-icon-lg.png" alt="voltar" class="seta-img"> Voltar
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
