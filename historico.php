<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado - Histórico de Compras</title>
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #070442;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
        }

        /* Topo da página / Branding */
        .brand-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .logo-icon {
            background-color: #fca311;
            padding: 10px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .logo-text .cantina {
            color: #fca311;
            font-size: 24px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .logo-text .conrado {
            color: #ffffff;
            font-size: 28px;
            font-weight: 800;
            text-transform: capitalize;
        }

        /* Card Principal */
        .history-card {
            background-color: #0b1a47;
            border-radius: 8px;
            padding: 30px 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .history-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #ffffff;
        }

        /* Item do Histórico */
        .order-item {
            border-bottom: 1px solid #14285f;
            padding: 25px 0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        /* Linha de Cabeçalho da Tabela Interna */
        .item-table-header {
            display: grid;
            grid-template-columns: 1fr 120px 80px;
            text-align: right;
            margin-bottom: 10px;
        }

        .header-label {
            font-size: 12px;
            color: #a0aec0;
            font-weight: 400;
        }

        /* Linha de Conteúdo Principal */
        .item-main {
            display: grid;
            grid-template-columns: auto 1fr 120px 80px;
            align-items: start;
            gap: 20px;
        }

        /* Imagem do Produto */
        .product-img {
            width: auto;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            background-color: #14285f; /* Fallback visual */
        }

        /* Detalhes do Produto */
        .product-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .product-name {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
        }

        .product-description {
            font-size: 11px;
            color: #cbd5e0;
            line-height: 1.4;
            max-width: 320px;
        }

        /* Valores e Preços */
        .price-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
        }

        .unit-price {
            font-size: 16px;
            color: #ffffff;
            font-weight: 400;
        }

        .total-price {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
        }

        /* Badge de Quantidade */
        .quantity-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
        }

        .quantity-badge {
            background-color: #12224d;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 4px;
            min-width: 30px;
            text-align: center;
            border: 1px solid #1a2f6a;
        }

        /* Responsividade Básica */
        @media (max-width: 600px) {
            .item-main {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .item-table-header {
                display: none;
            }
            .product-description {
                max-width: 100%;
                margin: 0 auto;
            }
            .price-container, .quantity-container {
                align-items: center;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        
        <!-- Topo da página / Branding -->
        <header class="brand-header">
            <div class="logo-icon">
                
            </div>
            <div class="logo-text">
                <span class="cantina">Cantina</span>
                <span class="conrado">Conrado</span>
            </div>
        </header>

        <!-- Histórico de Compras -->
        <main class="history-card">
            <h1 class="history-title">Histórico de Compras</h1>

            <!-- Pedido 1 -->
            <div class="order-item">
                <div class="item-table-header">
                    <div></div>
                    <div class="header-label">Preço Total</div>
                    <div class="header-label">Qtd.</div>
                </div>
                <div class="item-main">
                    <img class="product-img" src="images/hotdog.png" >
                    <div class="product-details">
                        <h2 class="product-name">Hot -dog</h2>
                        <p class="product-description">Pão para hot dog, salsicha, molho de tomate, ketchup, maionese.</p>
                    </div>
                    <div class="price-container">
                        <span class="unit-price">R$ 20,00</span>
                        <span class="total-price">R$ 60,00</span>
                    </div>
                    <div class="quantity-container">
                        <div class="quantity-badge">3</div>
                    </div>
                </div>
            </div>

            <!-- Pedido 2 -->
            <div class="order-item">
                <div class="item-table-header">
                    <div></div>
                    <div class="header-label">Preço Total</div>
                    <div class="header-label">Qtd.</div>
                </div>
                <div class="item-main">
                    <img class="product-img" src="https://unsplash.com" alt="Hot-dog">
                    <div class="product-details">
                        <h2 class="product-name">Hot -dog</h2>
                        <p class="product-description">Pão para hot dog, salsicha, molho de tomate, ketchup, maionese.</p>
                    </div>
                    <div class="price-container">
                        <span class="unit-price">R$ 20,00</span>
                        <span class="total-price">R$ 40,00</span>
                    </div>
                    <div class="quantity-container">
                        <div class="quantity-badge">2</div>
                    </div>
                </div>
            </div>

            <!-- Pedido 3 -->
            <div class="order-item">
                <div class="item-table-header">
                    <div></div>
                    <div class="header-label">Preço Total</div>
                    <div class="header-label">Qtd.</div>
                </div>
                <div class="item-main">
                    <img class="product-img" src="https://unsplash.com" alt="Hot-dog">
                    <div class="product-details">
                        <h2 class="product-name">Hot -dog</h2>
                        <p class="product-description">Pão para hot dog, salsicha, molho de tomate, ketchup, maionese.</p>
                    </div>
                    <div class="price-container">
                        <span class="unit-price">R$ 20,00</span>
                        <span class="total-price">R$ 60,00</span>
                    </div>
                    <div class="quantity-container">
                        <div class="quantity-badge">1</div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
