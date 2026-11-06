
<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . "/../../vendor/autoload.php";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = $_ENV['MAIL_USER'];
$mail->Password = $_ENV['MAIL_PASS'];

$mail->CharSet = "UTF-8";
$mail->isHTML(true);

return $mail;
