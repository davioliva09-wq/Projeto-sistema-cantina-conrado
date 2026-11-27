
<?php

// =============================================
// 1. INICIALIZAÇÃO
// =============================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// =============================================
// 2. CONEXÃO E MODEL
// =============================================

require_once '../routes/conexao.php';
require_once '../models/Pedidos.php';

$pedidoModel = new Pedidos($conn);


// =============================================
// 3. CONFIGURAÇÕES DOS STATUS
// =============================================

$colunas = [

    'novos' => [
        'titulo' => 'Novos pedidos',
        'status' => ['novo']
    ],

    'em_preparo' => [
        'titulo' => 'Em preparo',
        'status' => ['em preparo']
    ],

    'finalizados' => [
        'titulo' => 'Prontos e entregues',
        'status' => ['pronto', 'entregue']
    ]

];


$proximosStatus = [

    'novo' => 'em preparo',

    'em preparo' => 'pronto',

    'pronto' => 'entregue'

];


$textosBotoes = [

    'novo' => 'Iniciar preparo',

    'em preparo' => 'Marcar como pronto',

    'pronto' => 'Marcar como entregue'

];


// =============================================
// 4. ATUALIZAR STATUS DO PEDIDO
// =============================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idPedido = filter_input(
        INPUT_POST,
        'id_pedido',
        FILTER_VALIDATE_INT
    );

    $status = $_POST['status'] ?? '';

    if (
        $idPedido &&
        in_array($status, $proximosStatus, true)
    ) {

        $atualizado = $pedidoModel->atualizarStatus(
            $idPedido,
            $status
        );

        $mensagem = $atualizado ? 'sucesso' : 'erro';

    } else {

        $mensagem = 'erro';

    }

    header("Location: admin-pedidos.php?$mensagem=1");
    exit;

}


// =============================================
// 5. LISTAR PEDIDOS
// =============================================

$pedidos = $pedidoModel->listarPedidos();


// =============================================
// 6. AGRUPAR PEDIDOS NAS TRÊS FAIXAS
// =============================================

$pedidosPorStatus = [];

foreach ($colunas as $chave => $coluna) {

    $pedidosPorStatus[$chave] = [];

}


foreach ($pedidos as $pedido) {

    $status = $pedido['status_pedido'];

    foreach ($colunas as $chave => $coluna) {

        if (in_array($status, $coluna['status'], true)) {

            $pedidosPorStatus[$chave][] = $pedido;

            break;

        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciamento de pedidos</title>

    <link rel="stylesheet" href="css/style.css">

</head>


<body>

<?php include 'admin-header.php'; ?>


<div id="wrapper">


    <!-- =====================================
         SIDEBAR
    ====================================== -->

    <aside id="sidebar">

        <a
            href="javascript:void(0)"
            class="fechar-sidebar"
            onclick="alternarSidebar()"
        >
            ×
        </a>

        <nav>

            <a href="admin-dashboard.php">
                Dashboard
            </a>

            <a href="admin-pedidos.php" class="ativo">
                Pedidos
            </a>

            <a href="admin-estoque.php">
                Estoque
            </a>

            <a href="admin-relatorio.php">
                Relatórios
            </a>

            <a href="admin-usuarios.php">
                Usuários
            </a>

        </nav>

    </aside>


    <!-- =====================================
         CONTEÚDO PRINCIPAL
    ====================================== -->

    <main>

        <section class="pedidos">


            <!-- CABEÇALHO -->

            <header class="cabecalho-pedidos">

                <h1>Gerenciamento de pedidos</h1>

                <p>
                    Acompanhe e atualize o andamento dos pedidos da cantina.
                </p>

            </header>


            <!-- MENSAGENS -->

            <?php if (isset($_GET['sucesso'])): ?>

                <div class="mensagem sucesso">

                    Status do pedido atualizado com sucesso!

                </div>

            <?php endif; ?>


            <?php if (isset($_GET['erro'])): ?>

                <div class="mensagem erro">

                    Não foi possível atualizar o pedido.
                    Verifique se ele ainda está no status anterior
                    e se o pagamento foi aprovado.

                </div>

            <?php endif; ?>


            <!-- =====================================
                 QUADRO DE PEDIDOS
            ====================================== -->

            <div class="pedidos-container">


                <?php foreach ($colunas as $chave => $coluna): ?>


                    <!-- FAIXA -->

                    <section class="faixa-pedidos">


                        <!-- TÍTULO DA FAIXA -->

                        <div class="titulo-coluna">

                            <h2>
                                <?= htmlspecialchars($coluna['titulo']) ?>
                            </h2>

                            <span class="contador">

                                <?= count($pedidosPorStatus[$chave]) ?>

                            </span>

                        </div>


                        <!-- LISTA DE PEDIDOS -->

                        <div class="lista-pedidos">


                            <?php if (!empty($pedidosPorStatus[$chave])): ?>


                                <?php foreach ($pedidosPorStatus[$chave] as $pedido): ?>


                                    <?php

                                    $status = $pedido['status_pedido'];

                                    $id = (int) $pedido['id_pedidos'];

                                    $itens = $pedidoModel->listarItensPedido($id);

                                    ?>


                                    <!-- CARD DO PEDIDO -->

                                    <article class="pedido-card status-<?= str_replace(' ', '-', htmlspecialchars($status)) ?>">


                                        <!-- TOPO -->

                                        <div class="pedido-topo">

                                            <h3>

                                                Pedido #

                                                <?= str_pad(
                                                    $id,
                                                    3,
                                                    '0',
                                                    STR_PAD_LEFT
                                                ) ?>

                                            </h3>

                                            <span>

                                                <?= date(
                                                    'H:i',
                                                    strtotime($pedido['data_pedido'])
                                                ) ?>

                                            </span>

                                        </div>


                                        <!-- CLIENTE -->

                                        <div class="informacao">

                                            <strong>Cliente:</strong>

                                            #<?= htmlspecialchars(
                                                (string) $pedido['id_login']
                                            ) ?>

                                        </div>


                                        <!-- PRODUTOS -->

                                        <div class="informacao produtos">

                                            <strong>Produtos:</strong>


                                            <?php if (!empty($itens)): ?>

                                                <ul>

                                                    <?php foreach ($itens as $item): ?>

                                                        <li>

                                                            <?= htmlspecialchars(
                                                                $item['nome_produto']
                                                            ) ?>

                                                            <span>
                                                                (<?= (int) $item['Quantidade'] ?>x)
                                                            </span>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>

                                            <?php else: ?>

                                                <p>Nenhum produto encontrado.</p>

                                            <?php endif; ?>

                                        </div>


                                        <!-- PAGAMENTO -->

                                        <div class="informacao pagamento">

                                            <strong>Pagamento:</strong>

                                            <span>
                                                <?= htmlspecialchars(
                                                    $pedido['forma_pagamento']
                                                ) ?>
                                            </span>

                                            <span class="pago">
                                                Pago
                                            </span>

                                        </div>


                                        <!-- VALOR TOTAL -->

                                        <div class="pedido-rodape">

                                            <strong>

                                                Total: R$

                                                <?= number_format(
                                                    (float) $pedido['valor_total'],
                                                    2,
                                                    ',',
                                                    '.'
                                                ) ?>

                                            </strong>

                                        </div>


                                        <!-- ATUALIZAR STATUS -->

                                        <?php if ($status !== 'entregue'): ?>


                                            <form
                                                method="POST"
                                                class="form-status"
                                            >

                                                <input
                                                    type="hidden"
                                                    name="id_pedido"
                                                    value="<?= $id ?>"
                                                >

                                                <input
                                                    type="hidden"
                                                    name="status"
                                                    value="<?= htmlspecialchars(
                                                        $proximosStatus[$status]
                                                    ) ?>"
                                                >

                                                <button type="submit">

                                                    <?= htmlspecialchars(
                                                        $textosBotoes[$status]
                                                    ) ?>

                                                </button>

                                            </form>


                                        <?php else: ?>


                                            <div class="pedido-finalizado">

                                                Pedido entregue

                                            </div>


                                        <?php endif; ?>


                                    </article>


                                <?php endforeach; ?>


                            <?php else: ?>


                                <div class="sem-pedidos">

                                    Nenhum pedido nesta faixa.

                                </div>


                            <?php endif; ?>


                        </div>

                    </section>


                <?php endforeach; ?>


            </div>

        </section>

    </main>

</div>


<!-- =============================================
     CSS
============================================= -->

<style>

/* =============================================
   ESTRUTURA PRINCIPAL
============================================= */

.pedidos {

    width: 100%;

    max-width: none !important;

    background: transparent !important;

    box-shadow: none !important;

    box-sizing: border-box;

}


.cabecalho-pedidos {

    margin-bottom: 25px;

}


.cabecalho-pedidos h1 {

    color: #071a40;

    margin-bottom: 5px;

}


.cabecalho-pedidos p {

    color: #777;

    font-size: 14px;

}


/* =============================================
   MENSAGENS
============================================= */

.mensagem {

    padding: 12px 15px;

    margin-bottom: 20px;

    border-radius: 6px;

    font-size: 14px;

}


.mensagem.sucesso {

    background: #d9f5e5;

    color: #176b3a;

}


.mensagem.erro {

    background: #ffe1e1;

    color: #a32020;

}


/* =============================================
   CONTAINER DAS TRÊS FAIXAS
============================================= */

.pedidos-container {

    display: flex;

    flex-direction: column;

    gap: 25px;

    width: 100%;

}


/* =============================================
   FAIXAS DE PEDIDOS
============================================= */

.faixa-pedidos {

    background: #f5f6f8;

    border: 1px solid #ddd;

    border-radius: 10px;

    padding: 20px;

    width: 100%;

    box-sizing: border-box;

}


/* =============================================
   TÍTULOS
============================================= */

.titulo-coluna {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 18px;

}


.titulo-coluna h2 {

    margin: 0;

    font-size: 19px;

    color: #071a40;

}


.contador {

    background: #e5e7eb;

    color: #333;

    border-radius: 20px;

    padding: 5px 11px;

    font-size: 13px;

    font-weight: bold;

}


/* =============================================
   LISTA DE PEDIDOS
============================================= */

.lista-pedidos {

    display: grid;

    grid-template-columns: repeat(
        auto-fill,
        minmax(260px, 1fr)
    );

    gap: 15px;

    align-items: start;

}


/* =============================================
   CARDS
============================================= */

.pedido-card {

    background: white;

    border: 1px solid #ddd;

    border-radius: 8px;

    padding: 15px;

    box-sizing: border-box;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.04);

}


/* CORES POR STATUS */

.status-novo {

    border-top: 4px solid #ffa805;

}


.status-em-preparo {

    border-top: 4px solid #e49a13;

}


.status-pronto {

    border-top: 4px solid #22a861;

}


.status-entregue {

    border-top: 4px solid #777;

}


/* =============================================
   TOPO DOS CARDS
============================================= */

.pedido-topo {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 15px;

    padding-bottom: 10px;

    border-bottom: 1px solid #eee;

}


.pedido-topo h3 {

    margin: 0;

    font-size: 16px;

    color: #ffa805;

}


.pedido-topo span {

    font-size: 13px;

    color: #777;

}


/* =============================================
   INFORMAÇÕES
============================================= */

.informacao {

    margin: 10px 0;

    font-size: 14px;

    color: #444;

    line-height: 1.5;

}


/* PRODUTOS */

.produtos ul {

    padding-left: 18px;

    margin: 8px 0;

}


.produtos li {

    margin-bottom: 5px;

}


.produtos li span {

    color: #777;

    font-size: 12px;

}


/* =============================================
   PAGAMENTO
============================================= */

.pagamento {

    display: flex;

    align-items: center;

    gap: 7px;

    flex-wrap: wrap;

}


.pago {

    color: #168447;

    font-weight: bold;

    font-size: 12px;

    margin-left: auto;

}


/* =============================================
   TOTAL
============================================= */

.pedido-rodape {

    border-top: 1px solid #eee;

    margin-top: 12px;

    padding-top: 12px;

    text-align: right;

    color: #071a40;

    font-size: 15px;

}


/* =============================================
   BOTÕES
============================================= */

.form-status {

    margin: 0;

}


.pedido-card button {

    width: 100%;

    border: none;

    border-radius: 6px;

    padding: 11px;

    margin-top: 12px;

    background: #ffa805;

    color: white;

    font-weight: bold;

    cursor: pointer;

    transition: opacity 0.2s;

}


.pedido-card button:hover {

    opacity: 0.85;

}


/* =============================================
   PEDIDO ENTREGUE
============================================= */

.pedido-finalizado {

    background: #e8e8e8;

    color: #666;

    text-align: center;

    padding: 10px;

    margin-top: 12px;

    border-radius: 6px;

    font-size: 13px;

    font-weight: bold;

}


/* =============================================
   FAIXA VAZIA
============================================= */

.sem-pedidos {

    color: #888;

    font-size: 14px;

    text-align: center;

    padding: 25px 5px;

}


/* =============================================
   RESPONSIVIDADE
============================================= */

@media (max-width: 650px) {

    .faixa-pedidos {

        padding: 14px;

    }

    .lista-pedidos {

        grid-template-columns: 1fr;

    }

}

</style>


</body>

</html>
