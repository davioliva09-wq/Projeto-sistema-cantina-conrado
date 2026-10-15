<?php
require_once("mailConn.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
</head>
<body style="margin:0; padding:24px; background:#f4f4f4; font-family:Arial,sans-serif;">
    <div style="max-width:560px; margin:auto; padding:32px;
                background:#ffffff; border-radius:12px;">

        <h1 style="color:#333333; text-align:center;">
            Cantina Escolar
        </h1>

        <h2 style="color:#333333;">
            Redefina sua senha
        </h2>

        <p style="color:#555555; line-height:1.6;">
            Recebemos uma solicitação para redefinir a senha da sua conta.
        </p>

        <p style="color:#555555; line-height:1.6;">
            Clique no botão abaixo para criar uma nova senha.
        </p>

        <div style="text-align:center; margin:32px 0;">
            <a href="{{LINK_RECUPERACAO}}"
               style="display:inline-block; padding:14px 24px;
                      background:#2563eb; color:#ffffff;
                      text-decoration:none; border-radius:6px;
                      font-weight:bold;">
                Redefinir minha senha
            </a>
        </div>

        <p style="color:#777777; font-size:14px; line-height:1.6;">
            Este link expira em 30 minutos e só pode ser utilizado uma vez.
        </p>

        <p style="color:#777777; font-size:14px; line-height:1.6;">
            Se você não solicitou a recuperação, ignore esta mensagem.
        </p>
    </div>
</body>
</html>
