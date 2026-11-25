<?php
$config = require_once(__DIR__ . '/api/file.php');
require_once(__DIR__ . '/routes/conexao.php');

$access_token = trim($config['acesstoken']);
$input = file_get_contents('php://input');
$evento = json_decode($input, true);

if (isset($evento['type']) && $evento['type'] === 'payment' && isset($evento['data']['id'])) {
    $payment_id = (string) $evento['data']['id'];

    $opcoes = [
        'http' => [
            'method' => 'GET',
            'header' => "Authorization: Bearer " . $access_token . "\r\n",
            'ignore_errors' => true
        ],
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false
        ]
    ];

    $contexto = stream_context_create($opcoes);
    $url = 'https://api.' . 'mercadopago.com' . '/v1/payments/' . $payment_id;
    $response = file_get_contents($url, false, $contexto);
    $pagamento = json_decode($response, true);

    if (isset($pagamento['status']) && $pagamento['status'] === 'approved') {
        $stmt = $conn->prepare("SELECT id_pedidos, status_pagamento FROM pedidos WHERE `observaçao` = :obs LIMIT 1");
        $stmt->execute([':obs' => 'MP_ID:' . $payment_id]);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pedido && $pedido['status_pagamento'] !== 'pago') {
            $upd = $conn->prepare("UPDATE pedidos SET status_pagamento = 'pago', status_pedido = 'Preparando' WHERE id_pedidos = :id");
            $upd->execute([':id' => $pedido['id_pedidos']]);
        }
    }
}

http_response_code(200);
?>
