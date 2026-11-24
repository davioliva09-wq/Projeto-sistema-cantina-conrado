<?php
$config = require_once('../api/file.php');
require_once('../routes/conrado.php');

$acess_token = $config["acesstoken"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://mercadopago.com',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
  "transaction_amount": 1.00,
  "description": "Teste Lanche Cantina",
  "payment_method_id": "pix",
  "payer": {
    "email": "cliente.teste@gmail.com"
  }
}',
  CURLOPT_HTTPHEADER => array(
    'X-Idempotency-Key: ' . uniqid('pix_', true),
    'Content-Type: application/json',
    'Authorization: Bearer ' . $acess_token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
