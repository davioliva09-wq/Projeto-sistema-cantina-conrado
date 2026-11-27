<?php
session_start();

$config = require_once(__DIR__ . '/api/file.php');
require_once(__DIR__ . '/routes/conexao.php');

$access_token = trim($config['acesstoken']);

if (empty($_SESSION['usuario_id'])) {
    die("Você precisa estar logado para finalizar o pedido. <a href='views/index.php'>Voltar</a>");
}

if (empty($_SESSION['carrinho'])) {
    die("Seu carrinho está vazio! <a href='views/index.php'>Voltar</a>");
}

$id_usuario = (int) $_SESSION['usuario_id'];

// Busca dados do usuário na tabela 'usuarios'
$stmtUser = $conn->prepare("SELECT nome_completo, email FROM usuarios WHERE id_usuario = :id");
$stmtUser->execute([':id' => $id_usuario]);
$usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuário não encontrado.");
}

// 1. Calcula SEMPRE o valor total real com base nos itens que estão AGORA no carrinho
$valor_total = 0;
$stmtProd = $conn->prepare("SELECT preco FROM produtos WHERE id_produto = :id");

foreach ($_SESSION['carrinho'] as $id_produto => $qtd) {
    $stmtProd->execute([':id' => (int)$id_produto]);
    $prod = $stmtProd->fetch(PDO::FETCH_ASSOC);

    if ($prod && $qtd > 0) {
        $valor_total += (float)$prod['preco'] * (int)$qtd;
    }
}

if ($valor_total <= 0) {
    die("Nenhum produto válido no carrinho.");
}

// 2. Verifica se já existe um pedido pendente na sessão para não duplicar no F5
$id_pedido = $_SESSION['id_pedido_atual'] ?? null;

if ($id_pedido) {
    // Confirma se esse pedido ainda está 'pendente' no banco
    $stmtCheck = $conn->prepare("SELECT status_pagamento FROM pedidos WHERE id_pedidos = :id");
    $stmtCheck->execute([':id' => $id_pedido]);
    $pedExistente = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($pedExistente && $pedExistente['status_pagamento'] === 'pendente') {
        // Atualiza o valor caso o aluno tenha voltado ao carrinho e alterado algo
        $stmtAtualizaValor = $conn->prepare("UPDATE pedidos SET valor_subtotal = :sub, valor_total = :tot WHERE id_pedidos = :id");
        $stmtAtualizaValor->execute([
            ':sub' => $valor_total,
            ':tot' => $valor_total,
            ':id'  => $id_pedido
        ]);
    } else {
        // Se já foi pago ou não existe, força a criação de um novo pedido
        $id_pedido = null;
    }
}

// 3. Cria um novo pedido apenas se não houver um pendente ativo
if (!$id_pedido) {
    try {
        $sql = "INSERT INTO pedidos (id_login, data_pedido, status_pedido, valor_subtotal, valor_total, forma_pagamento, status_pagamento) 
                VALUES (:id_login, NOW(), 'Aguardando Pagamento', :subtotal, :total, 'Pix', 'pendente')";
        
        $stmtPed = $conn->prepare($sql);
        $stmtPed->execute([
            ':id_login' => $id_usuario,
            ':subtotal' => $valor_total,
            ':total'    => $valor_total
        ]);
        
        $id_pedido = $conn->lastInsertId();
        $_SESSION['id_pedido_atual'] = $id_pedido;
    } catch (Exception $e) {
        die("Erro ao registrar pedido: " . $e->getMessage());
    }
}

// 4. Gera o pagamento Pix no Mercado Pago com o $valor_total atualizado
$cpf_pagador = preg_replace('/\D/', '', $_POST['cpf'] ?? '49269081826');
$idempotency_key = uniqid('pix_' . $id_pedido . '_', true);
$partes_nome = explode(' ', trim($usuario['nome_completo']));
$primeiro_nome = $partes_nome[0];

$dados_pagamento = [
    "transaction_amount" => round($valor_total, 2),
    "description" => "Pedido #" . $id_pedido . " - Cantina Conrado",
    "payment_method_id" => "pix",
    // Quando ligar o ngrok, tire o // da linha abaixo e coloque o seu link HTTPS:
    // "notification_url" => "https://ngrok-free.app",
    "payer" => [
        "email" => $usuario['email'],
        "first_name" => $primeiro_nome,
        "identification" => [
            "type" => "CPF",
            "number" => $cpf_pagador
        ]
    ]
];

$opcoes = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/json\r\n" .
                     "Authorization: Bearer " . $access_token . "\r\n" .
                     "X-Idempotency-Key: " . $idempotency_key . "\r\n",
        'content' => json_encode($dados_pagamento),
        'ignore_errors' => true
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false
    ]
];

$contexto = stream_context_create($opcoes);
$url_api = 'https://api.' . 'mercadopago.com' . '/v1/payments';
$response = file_get_contents($url_api, false, $contexto);
$resultado = json_decode($response, true);

if (isset($resultado['point_of_interaction']['transaction_data'])) {
    $id_pagamento_mp = (string) $resultado['id'];
    $qr_code_copia_cola = $resultado['point_of_interaction']['transaction_data']['qr_code'];
    $qr_code_base64 = $resultado['point_of_interaction']['transaction_data']['qr_code_base64'];

    $stmtUpd = $conn->prepare("UPDATE pedidos SET `observaçao` = :obs WHERE id_pedidos = :id_pedido");
    $stmtUpd->execute([
        ':obs'       => 'MP_ID:' . $id_pagamento_mp,
        ':id_pedido' => $id_pedido
    ]);
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Pagamento Pix - Pedido #<?= $id_pedido ?></title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 30px; background: #f8f9fa; }
            .card { background: #fff; max-width: 420px; margin: auto; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            textarea { width: 100%; margin-top: 10px; padding: 8px; font-size: 12px; }
            button { margin-top: 10px; padding: 10px 20px; background: #009ee3; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
            #status-msg { margin-top: 15px; font-weight: bold; color: #d97706; }
        </style>
    </head>
    <body>
        <div class="card">
            <h2>Pedido #<?= $id_pedido ?></h2>
            <p>Total a pagar: <strong>R$ <?= number_format($valor_total, 2, ',', '.') ?></strong></p>
            <img src="data:image/png;base64,<?= $qr_code_base64 ?>" alt="QR Code Pix" style="width:240px;"/><br>
            <label><strong>Pix Copia e Cola:</strong></label>
            <textarea id="pix-code" rows="4" readonly><?= $qr_code_copia_cola ?></textarea>
            <button onclick="copiarPix()">Copiar Código Pix</button>
            <div id="status-msg">Aguardando confirmação do pagamento...</div>
        </div>

        <script>
            function copiarPix() {
                const textarea = document.getElementById('pix-code');
                textarea.select();
                document.execCommand('copy');
                alert('Código Pix copiado!');
            }

            setInterval(() => {
                fetch('verificar_status.php?id_pedido=<?= $id_pedido ?>')
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'pago') {
                            document.getElementById('status-msg').style.color = 'green';
                            document.getElementById('status-msg').innerText = 'Pagamento aprovado! Redirecionando...';
                            setTimeout(() => {
                                window.location.href = 'views/index.php?pagamento=sucesso';
                            }, 2000);
                        }
                    });
            }, 5000);
        </script>
    </body>
    </html>
    <?php
} else {
    echo "<h4>Erro ao gerar Pix no Mercado Pago:</h4><pre>";
    print_r($resultado);
    echo "</pre>";
}
?>