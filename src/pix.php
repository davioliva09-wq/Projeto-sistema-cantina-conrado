<?php
$config = require_once('../api/file.php');
require_once('../routes/conrado.php');

// Certifique-se de que a chave no file.php tenha o mesmo nome ('accesstoken' ou 'acesstoken')
$access_token = $config['acesstoken'];

// Gera uma chave única obrigatória para cada tentativa de pagamento
$idempotency_key = uniqid('pix_', true);

// Dados do pagamento estruturados em array para evitar erros de formatação JSON
$dados_pagamento = [
    "transaction_amount" => (float) $valor_total_carrinho, // Valor real vindo do seu banco/sessão
    "description" => "Pedido #" . $id_pedido . " - Cantina",
    "payment_method_id" => "pix",
    "notification_url" => "https://seudominio.com.br", // URL pública obrigatória para aviso automático
    "payer" => [
        "email" => $email_aluno, // E-mail real do aluno (NÃO pode ser o mesmo e-mail da conta Mercado Pago recebedora)
        "first_name" => $nome_aluno,
        "identification" => [
            "type" => "CPF",
            "number" => $cpf_aluno // Apenas números (11 dígitos), recomendado para evitar bloqueio antifraude
        ]
    ]
];


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
    CURLOPT_POSTFIELDS => json_encode($dados_pagamento),
    CURLOPT_HTTPHEADER => array(
        'X-Idempotency-Key: ' . $idempotency_key,
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "Erro cURL: " . $err;
} else {
    $resultado = json_decode($response, true);

    // Verifica se o QR Code foi gerado com sucesso
    if (isset($resultado['point_of_interaction']['transaction_data'])) {
        $qr_code_copia_cola = $resultado['point_of_interaction']['transaction_data']['qr_code'];
        $qr_code_base64 = $resultado['point_of_interaction']['transaction_data']['qr_code_base64'];

        echo "<h3>Pagamento Pix Gerado!</h3>";
        echo "<img src='data:image/png;base64," . $qr_code_base64 . "' alt='QR Code Pix' style='width:250px;'/><br><br>";
        echo "<label>Pix Copia e Cola:</label><br>";
        echo "<textarea rows='4' cols='50' readonly>" . $qr_code_copia_cola . "</textarea>";
    } else {
        // Exibe o retorno completo caso o Mercado Pago retorne algum erro de validação ou token
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    }
}
?>
