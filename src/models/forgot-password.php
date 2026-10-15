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
            reset_token_expires  = ?
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
       $mail->Subject = "Reset senha"   ;
       $link = "http://localhost/Sistema%20cantina/src/views/veriToken.php?token=" . urlencode($token);

$mail->isHTML(true);
$mail->Subject = "Redefinição de senha - Cantina Escolar";
$mail->Body = <<<END
    <h2>Redefinição de senha</h2>
    <p>Recebemos uma solicitação para redefinir sua senha.</p>
    <p>
        <a href="$link">Clique aqui para redefinir sua senha</a>
    </p>
    <p>Este link expira em 30 minutos.</p>
END;
       try{
        $mail->send();
       }catch(Exception $e){
    echo "Erro do PHPMailer: " . $mail->ErrorInfo;
       }
}

echo "mensagem enviada";
