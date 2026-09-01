<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
    
    <?php include "header.php" ?>

    <div class="card">

        <div>

            <h2>Itens (00)</h2>
            <div class="informacao">
                <h3 class="info-preco">Preço</h3>
                <h3 class="info-quantidade">Qtd.</h3>
            </div>
            <hr>

            <div class="item-carrinho">

                <img class="foto-produto" src="fundo-abstrato-cinza_1134661-11961.webp" alt="">

                <div>
                    <h3 class="nome-item">Item 2</h3>
                    <p class="desc-item">A descrição do item fica aqui, com detalhes e detalhes.</p>
                </div>


            </div>

            <hr>

                <div class="card-continuar-compra">
                   
                         <a href="catalogo.php"><i class="fa-solid fa-arrow-left seta"></i>Continuar comprando</a>
            
                </div>

                <div class="card-resumo">
                    <h3>Resumo do pedido</h3>
                    <div class="linha-resumo">
                        <p>1 Item</p>
                    </div>
                    <div class="linha-total">
                        <strong>Total</strong>
                        <span class="preco-total">R$ 00,00</span>
                    </div>
                    <button class="botao-finalizar">
                        <a href="pagamento.php">
                        <i class="sacola"></i> Finalizar pedido
                        </a>
                    </button>
                </div>
        </div>

    </div>

    <?php include "footer.php" ?>

</body>

</html>