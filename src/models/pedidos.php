
<?php

class Pedidos
{
    private PDO $db;

    public function __construct(PDO $conexao)
    {
        $this->db = $conexao;
    }

    // Listar todos os pedidos
    public function listarPedidos()
    {
        $sql = "SELECT * FROM pedidos
                ORDER BY data_pedido DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um pedido específico
    public function buscarPedido($idPedido)
    {
        $sql = "SELECT * FROM pedidos
                WHERE id_pedidos = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $idPedido
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   
public function atualizarStatus($idPedido, $status)
{
    $statusPermitidos = [
        'em preparo',
        'pronto',
        'entregue'
    ];

    if (!in_array($status, $statusPermitidos, true)) {
        return false;
    }

    $transicoes = [
        'novo' => 'em preparo',
        'em preparo' => 'pronto',
        'pronto' => 'entregue'
    ];

    // Impede pular etapas
    $statusAnterior = array_search($status, $transicoes, true);

    if ($statusAnterior === false) {
        return false;
    }

    $sql = "UPDATE pedidos
            SET status_pedido = :status
            WHERE id_pedidos = :id
            AND status_pedido = :anterior
            AND status_pagamento = 'aprovado'";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        ':status' => $status,
        ':id' => $idPedido,
        ':anterior' => $statusAnterior
    ]);
}

    // Listar pedidos por status
    public function listarPorStatus($status)
    {
        $sql = "SELECT * FROM pedidos
                WHERE status_pedido = :status
                ORDER BY data_pedido DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':status' => $status
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// Listar os produtos de um pedido específico
public function listarItensPedido($idPedido)
{
    $sql = "SELECT
                ip.ID_item,
                ip.ID_pedido,
                ip.ID_produto,
                ip.Quantidade,
                ip.Preco_Unit,
                ip.Subtotal,
                p.nome AS nome_produto,
                p.imagem AS imagem_produto
            FROM itens_pedidos ip
            INNER JOIN produtos p
                ON ip.ID_produto = p.id_produto
            WHERE ip.ID_pedido = :id
            ORDER BY ip.ID_item ASC";

    $stmt = $this->db->prepare($sql);

    $stmt->execute([
        ':id' => $idPedido
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
