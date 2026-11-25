<?php
// confirmar.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Aprovado - Cantina Escolar</title>
</head>
<body style="position: relative; overflow: hidden; background-color: #070442; color: #ffffff; margin: 0; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; box-sizing: border-box;">

    <!-- Círculos decorativos no fundo (mesmo estilo do seu CSS) -->
    <div style="width: 400px; height: 400px; top: -150px; right: -100px; position: absolute; background-color: #10517b; border-radius: 50%; opacity: 0.6; pointer-events: none;"></div>
    <div style="width: 400px; height: 400px; bottom: -150px; left: -100px; position: absolute; background-color: #10517b; border-radius: 50%; opacity: 0.6; pointer-events: none;"></div>

    <!-- Card Principal -->
    <div style="position: relative; z-index: 1; width: 100%; max-width: 480px; background-color: #040227; border: 2px solid #0a056b; border-top: 6px solid #4eae7b; padding: 45px 30px; border-radius: 12px; box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5); text-align: center; box-sizing: border-box;">

        <!-- Ícone de Aprovação (--verde: #4eae7b) -->
        <div style="width: 72px; height: 72px; margin: 0 auto 22px auto; background-color: rgba(78, 174, 123, 0.15); border: 3px solid #4eae7b; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 36px; color: #4eae7b; font-weight: bold;">
            ✓
        </div>

        <!-- Título -->
        <h1 style="color: #ffa805; font-size: 28px; font-weight: 800; margin: 0 0 12px 0; letter-spacing: 0.5px;">
            Pagamento aprovado!
        </h1>

        <!-- Linha decorativa -->
        <div style="width: 60px; height: 4px; background-color: #e09304; margin: 0 auto 20px auto; border-radius: 2px;"></div>

        <!-- Mensagem -->
        <p style="color: #e6e6f0; font-size: 16px; line-height: 1.6; margin: 0 0 30px 0;">
            Seu pagamento foi confirmado com sucesso.
        </p>

        <!-- Botão de retorno -->
        <a href="index.php" style="display: inline-block; background-color: #ffa805; color: #040227; border: 2px solid #e09304; padding: 14px 32px; font-size: 16px; font-weight: bold; border-radius: 8px; text-decoration: none; letter-spacing: 0.3px; box-shadow: 0 4px 12px rgba(255, 168, 5, 0.3);">
            Voltar ao início
        </a>

    </div>

</body>
</html>
