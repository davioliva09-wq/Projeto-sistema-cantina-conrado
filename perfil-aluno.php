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
    <link rel="stylesheet" href="perfil-aluno.css">
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

                    <!-- Campo Telefone -->
                    <div class="input-group">
                        <label>Telefone</label>
                        <div class="phone-fields">
                            <div class="input-container">
                                <i class="fa-solid fa-phone"></i>
                                <input type="text" class="ddd-input" placeholder="(00)">
                            </div>
                            <div class="input-container" style="flex: 1;">
                                <input type="text" placeholder="00000-0000">
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
                        <a href="#" class="btn-yellow">Histórico</a>
                        <button class="btn-yellow">Sair da conta</button>
                    </div>
                </section>

            </div>

            <!-- Rodapé do Card -->
            <footer class="card-footer">
                <a href="#" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </footer>

        </main>
    </div>

</body>
</html>
