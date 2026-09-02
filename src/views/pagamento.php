<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pagamento - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style-pag.css">

</head>


<body>

    <?php include "header.php" ?>


    <main>

        <h1>Pagamento</h1>

        <div class="pagamento">


            <section class="resumo">

                <h2>
                    Resumo do pedido
                </h2>


                <div class="produto">

                    <p>
                        <strong>1x Hot-dog</strong>
                    </p>

                    <p>
                        R$ 20,00
                    </p>

                </div>


                <div class="produto">

                    <p>
                        <strong>1x Coca-Cola</strong>
                    </p>

                    <p>
                        R$ 5,00
                    </p>

                </div>


                <div class="total">

                    <span>
                        Total
                    </span>

                    <span>
                        R$ 25,00
                    </span>

                </div>

            </section>


            <section class="metodo">

                <h2>
                    Método de pagamento
                </h2>

                <p>
                    Selecione uma forma de pagamento:
                </p>


                <form
                    action="#"
                    method="POST"
                >

                    <input
                        type="hidden"
                        name="pedido_id"
                        value="1"
                    >

                    <input
                        type="hidden"
                        name="valor_total"
                        value="25.00"
                    >


                    <div class="opcoes">

                        <label class="opcao">

                            <input
                                type="radio"
                                name="metodo_pagamento"
                                value="pix"
                                required
                            >

                            <br>

                            PIX

                        </label>


                        <label class="opcao">

                            <input
                                type="radio"
                                name="metodo_pagamento"
                                value="cartao"
                            >

                            <br>

                            Dinheiro

                        </label>

                    </div>


                    <div class="api-area">

                        <p>
                            Área de pagamento
                        </p>

                        <p>
                            Após selecionar o método de pagamento,
                            as informações serão carregadas aqui.
                        </p>

                    </div>


                    <div class="botoes">

                        <button type="submit">
                            Continuar
                        </button>

                        <a
                            href="carrinho.php"
                            class="cancelar"
                        >
                            Cancelar
                        </a>

                    </div>

                </form>

            </section>


        </div>

    </main>



    <?php include "footer.php" ?>

</body>

</html>