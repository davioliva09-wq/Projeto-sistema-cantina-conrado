<!DOCTYPE html>

<html lang="pt-BR">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <link rel="stylesheet" href="css/style.css">
 </head>

 <body>

 <?php include "admin-header.php" ?>

 <div id="wrapper">

    <aside id="sidebar">
        <a href="javascript:void(0)" class="fechar-sidebar" onclick="alternarSidebar()">×</a>
        <nav>
            <a href="admin-dashboard.php">Dashboard</a>
            <a href="admin-pedidos.php" class="ativo">Pedidos</a>
            <a href="admin-estoque.php">Estoque</a>
            <a href="admin-relatorio.php">Relatórios</a>
            <a href="admin-usuarios.php">Usuários</a>
        </nav>
    </aside>

    <main>

        <section class="pedidos">

            <h1 style="color: #071a40">Pedidos</h1>

            <div class="pedidos-container">

                <!-- NOVOS PEDIDOS -->
                <div class="coluna-pedidos novos">

                    <h2>Novos pedidos</h2>

                    <article class="pedido-card"
                        data-pedido="001"
                        data-status="novo">

                        <div class="pedido-topo">
                            <h3>Pedido #001</h3>
                            <span>10:30</span>
                        </div>

                        <p>
                            <strong>Cliente:</strong> João Silva
                        </p>

                        <p>
                            <strong>Produtos:</strong><br>
                            X-Burguer<br>
                            Coca-Cola
                        </p>

                        <p class="total">
                            Total: R$ 18,00
                        </p>

                        <button type="button" onclick="aceitarPedido(this)">
                            Aceitar
                        </button>

                    </article>


                    <article class="pedido-card"
                        data-pedido="002"
                        data-status="novo">

                        <div class="pedido-topo">
                            <h3>Pedido #002</h3>
                            <span>09:30</span>
                        </div>

                        <p>
                            <strong>Cliente:</strong> Maria Souza
                        </p>

                        <p>
                            <strong>Produtos:</strong><br>
                            Coxinha<br>
                            Suco
                        </p>

                        <p class="total">
                            Total: R$ 10,00
                        </p>

                        <button type="button" onclick="aceitarPedido(this)">
                            Aceitar
                        </button>

                    </article>

                </div>


                <!-- PRONTOS -->
                <div class="coluna-pedidos prontos">

                    <h2>Prontos</h2>

                </div>


                <!-- ENTREGUES -->
                <div class="coluna-pedidos entregues">

                    <h2>Entregues</h2>

                </div>

            </div>

        </section>

    </main>

 </div>

 <style>

 /* =========================================
   ÁREA DOS PEDIDOS
   ========================================= */

 .pedidos {
    width: 100%;
    max-width: none !important;

    /* Tira o azul escuro do section */
    background: transparent !important;

    /* Tira a sombra do quadrado externo */
    box-shadow: none !important;

    box-sizing: border-box;
 }


 /* Título */

 .pedidos h1 {
    margin-bottom: 25px;
    color: white;
 }


 /* =========================================
   TRÊS COLUNAS
   ========================================= */

 .pedidos-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    width: 100%;
 }



 /* Mantém as três caixas claras da imagem */

 .coluna-pedidos {
    background: #f5f6f8;
    border: 1px solid #ddd;
    border-radius: 10px;

    padding: 15px;
    min-height: 400px;

    box-sizing: border-box;
 }


 /* Títulos das colunas */

 .coluna-pedidos h2 {
    margin: 0 0 15px 0;
    font-size: 20px;
    color: #071a40;
 }


 /* =========================================
   CARDS DOS PEDIDOS
   ========================================= */

 .pedido-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;

    padding: 15px;
    margin-bottom: 15px;
 }


 /* Topo do pedido */

 .pedido-topo {
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 10px;
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


 /* Texto */

 .pedido-card p {
    margin: 8px 0;

    font-size: 14px;
    color: #444;

    line-height: 1.5;
 }


 /* Total */

 .pedido-card .total {
    text-align: right;

    font-weight: bold;
    color: #071a40;
 }


 /* Botão */

 .pedido-card button {
    width: 100%;

    border: none;
    border-radius: 6px;

    padding: 10px;
    margin-top: 8px;

    background: #ffa805;
    color: white;

    font-weight: bold;
    cursor: pointer;
 }

 .pedido-card button:hover {
    opacity: .9;
 }


 /* Botões das outras colunas */

 .prontos .pedido-card button {
    background: #22a861;
 }

 .entregues .pedido-card button {
    background: #aaa;
    cursor: default;
 }


 /* =========================================
   CELULAR
   ========================================= */

 @media (max-width: 1000px) {

    .pedidos-container {
        grid-template-columns: 1fr;
    }

 }

 </style>

 </body>
</html>