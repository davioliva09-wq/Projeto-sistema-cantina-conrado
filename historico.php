<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina Conrado - Histórico de Compras</title>
    
    <link rel="stylesheet" href="https://cloudflare.com">
    
    <!-- Importação de fontes (Montserrat, Fredoka e Rammetto One) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/style-hist.css">
    
</head>
<body>

    <div class="container">
        
        <!-- Topo da página / Branding -->
        <header class="header-logo">
            <div class="logo-icon">
                <img src="images/logo.png" alt="" srcset="">
            </div>
            <div class="logo-text">
                <h1 class="brand-name">Cantina<br>Conrado</h1>
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
                    <img class="product-img" src="images/hotdog.png" alt="Hot-dog">
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
                    <img class="product-img" src="images/hotdog.png" alt="Hot-dog">
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

             <!-- Rodapé do Card -->
            <footer class="card-footer">
                <a href="perfil-aluno.php" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </footer>

        </main>
    </div>

</body>
</html>
