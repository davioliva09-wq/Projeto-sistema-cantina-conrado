<?php
session_start();
header('Content-Type: application/json');
require_once(__DIR__ . '/routes/conexao.php');

$id_pedido = (int) ($_GET['id_pedido'] ?? 0);

$stmt = $conn->prepare("SELECT status_pagamento FROM pedidos WHERE id_pedidos = :id LIMIT 1");
$stmt->execute([':id' => $id_pedido]);
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

$status = $pedido['status_pagamento'] ?? 'pendente';

if ($status === 'pago') {
    unset($_SESSION['id_pedido_atual']);
    unset($_SESSION['hash_carrinho']);
    unset($_SESSION['carrinho']);
}

echo json_encode([
    'status' => $status
]);
?>
