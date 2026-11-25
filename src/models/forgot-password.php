<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

require __DIR__ . " ../../routes/conexao.php";

$sql = "UPDATE usuarios 
        SET reset_token_hash = ?,
            reset_token_expires = ?
        WHERE email = ?";

//$stmt = $mysqli->prepare($sql);
$stmt = $conn->prepare($sql);

$stmt->execute([
    $token_hash,
    $expiry,
    $email
]);

if($stmt->rowCount() > 0){

    $mail = require __DIR__. "/mailer.php";

    $mail->setFrom("davi.oliva09@gmail.com", "Nome do seu site");
    $mail->addAddress($email);
    $mail->Subject = "Reset senha" ;

    $link = "http://localhost/Sistema%20cantina/src/views/veriToken.php?token=" . urlencode($token);
    $mail->isHTML(true);
    $mail->Subject = "Redefinição de senha - Cantina Escolar";

    $mail->Body = <<<END
    <div style="background-color: #070442; color: #ffffff; margin: 0; padding: 50px 20px; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
        <div style="width: 100%; max-width: 560px; margin: 0 auto; background-color: #040227; border: 2px solid #0a056b; border-top: 6px solid #ffa805; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); overflow: hidden; box-sizing: border-box;">
            
            <!-- Cabeçalho do E-mail -->
            <div style="background-color: #090551; padding: 25px 30px; text-align: center; border-bottom: 1px solid #0a056b;">
                <span style="display: inline-block; background-color: rgba(255, 168, 5, 0.15); color: #ffa805; border: 1px solid #ffa805; font-size: 11px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.5px; padding: 5px 14px; border-radius: 20px; margin-bottom: 12px;">
                    Segurança da Conta
                </span>
                <h2 style="color: #ffa805; font-size: 26px; font-weight: 800; margin: 0; letter-spacing: 0.5px;">
                    Redefinição de senha
                </h2>
                <div style="width: 60px; height: 4px; background-color: #e09304; margin: 12px auto 0; border-radius: 2px;"></div>
            </div>

            <!-- Conteúdo Principal -->
            <div style="padding: 35px 30px; text-align: center;">
                <p style="color: #e6e6f0; font-size: 16px; line-height: 1.6; margin-top: 0; margin-bottom: 28px;">
                    Recebemos uma solicitação para redefinir sua senha.
                </p>

                <p style="margin: 0 0 30px 0;">
                    <a href="$link" style="display: inline-block; background-color: #ffa805; color: #040227; border: 2px solid #e09304; padding: 15px 32px; font-size: 16px; font-weight: 800; border-radius: 8px; text-decoration: none; letter-spacing: 0.3px; box-shadow: 0 4px 12px rgba(255, 168, 5, 0.35);">
                        Clique aqui para redefinir sua senha
                    </a>
                </p>

                <!-- Box de Aviso -->
                <div style="background-color: #070442; border-left: 4px solid #e09304; border-radius: 6px; padding: 14px 18px; text-align: left; margin-top: 10px;">
                    <p style="color: #d0d0e0; font-size: 14px; margin: 0; line-height: 1.5;">
                        ⏳ Este link expira em <strong style="color: #ffa805;">30 minutos</strong>.
                    </p>
                </div>
            </div>

        </div>
    </div>
END;

    try{
        $mail->send();
    }catch(Exception $e){
        echo '<div style="background-color: #070442; color: #ffffff; margin: 0; padding: 20px; font-family: sans-serif; text-align: center;">
                <div style="max-width: 500px; margin: 20px auto; background-color: #040227; border: 1px solid #e74c3c; border-left: 5px solid #e74c3c; padding: 15px 20px; border-radius: 8px; color: #ff8a80; font-size: 14px;">
                    Erro do PHPMailer: ' . $mail->ErrorInfo . '
                </div>
              </div>';
    }

}

echo '<div style="position: relative; overflow: hidden; background-color: #070442; color: #ffffff; margin: 0; font-family: \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; box-sizing: border-box;">
        
        <!-- Círculos decorativos idênticos ao seu CSS -->
        <div style="width: 400px; height: 400px; top: -150px; right: -100px; position: absolute; background-color: #10517b; border-radius: 50%; opacity: 0.6; pointer-events: none;"></div>
        <div style="width: 400px; height: 400px; bottom: -150px; left: -100px; position: absolute; background-color: #10517b; border-radius: 50%; opacity: 0.6; pointer-events: none;"></div>

        <!-- Card Principal -->
        <div style="position: relative; z-index: 1; width: 100%; max-width: 480px; background-color: #040227; border: 2px solid #0a056b; border-top: 6px solid #4eae7b; padding: 40px 30px; border-radius: 12px; box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5); text-align: center; box-sizing: border-box;">
            
            <!-- Ícone de Check Verde (--verde: #4eae7b) -->
            <div style="width: 64px; height: 64px; margin: 0 auto 20px auto; background-color: rgba(78, 174, 123, 0.15); border: 2px solid #4eae7b; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; color: #4eae7b; font-weight: bold;">
                ✓
            </div>

            <p style="color: #ffa805; font-size: 24px; font-weight: 800; margin: 0 0 10px 0; text-transform: capitalize; letter-spacing: 0.5px;">
                mensagem enviada
            </p>
            
            <div style="width: 50px; height: 4px; background-color: #e09304; margin: 0 auto; border-radius: 2px;"></div>
        </div>
      </div>';
