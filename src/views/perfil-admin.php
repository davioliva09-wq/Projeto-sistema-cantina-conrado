<?php
session_start();
require_once('../routes/conexao.php');

require_once("../models/admin.php");
$usuarioObjeto = new ADM($conn);
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 3;
$dados = $usuarioObjeto->mostDadosAdm($id_usuario);

$usuario = $dados ? $dados : [  
    'nome_completo' => '',
    'email' => '',
    'telefone' => ''
];
?>


</style>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado - Perfil do Administrador</title>
    <link rel="stylesheet" href="https://cloudflare.com">
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link href="https://googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/style-perfil.css">
</head>
<body>
    <div class="container">
        <header class="header-logo">
            <div class="logo-icon">
             <img src="images/logo.png" alt="Logo">
            </div>
            <h1 class="brand-name">Cantina<br>Conrado</h1>
        </header>
       <main class="card-config">
            <h2 class="card-title">Perfil do Administrador</h2>
            <div class="content-layout">
                <section class="form-side">
                    <div class="input-group">
                        <label for="nome">Nome completo</label>
                        <div class="input-container">
                            <i class="fa-solid fa-user"></i>
                            <!-- readonly impede a digitação -->
                            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome_completo'] ?? ''); ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>" readonly>
                        </div>
                    </div>
                 <div class="input-group">
    <label>Telefone</label>
    <div class="phone-fields">
        <!-- 1º Filho: Código do País (Ganha 85px pelo CSS) -->
        <div class="input-container">
            <input type="text" name="codigo_pais" value="+55" class="codigo-pais" readonly>
        </div>
        
        <!-- 2º Filho: Espaçador Oculto/Ícone (Consome os 100px que eram do DDD de forma limpa) -->
        <div class="input-container" style="justify-content: center;">
            <i class="fa-solid fa-phone" style="position: static; color: #a0aec0; font-size: 1.2rem;"></i>
        </div>
        
        <!-- 3º Filho: Número do Telefone Completo (Ganha flex: 1 e ocupa todo o resto) -->
        <div class="input-container">
            <input type="tel" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone'] ?? ''); ?>" readonly>
        </div>
    </div>
</div>

                </section>
                <section class="avatar-side">
                 
                    <div class="action-buttons">
                        <a href="historico.php" class="btn-yellow">Histórico</a>
                    </div>
                </section>
            </div>
            <footer class="card-footer">
                <a href="catalogo.php" class="btn-back">
    <i class="fa-solid fa-arrow-left"></i> Voltar
</a>
                <button type="button" class="btn-back btn-logout-footer">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair da conta
                </button>
            </footer>
        </main>
    </div>
</body>
</html>
