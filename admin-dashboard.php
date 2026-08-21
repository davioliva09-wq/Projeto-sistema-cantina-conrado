<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedidos - Cantina Conrado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <div>

            <a href="dashboard.php">

                <img class="smolpng" src="https://cdn-icons-png.flaticon.com/512/3075/3075929.png" alt="Cantina Conrado">
                <h2 id="title">Portal<br>Administrativo</h2>

            </a>

        </div>

        <nav>

            <a href="perfil-admin.php">
                Meu Perfil
            </a>

        </nav>

    </header>


    <main>

        <aside>

            <nav>

                <a href="dashboard.php">
                    Pedidos
                </a>

                <a href="admin-estoque.php">
                    Estoque
                </a>

                <a href="admin-relatorio.php">
                    Relatórios
                </a>

            </nav>

        </aside>


        <section>

            <h1>Pedidos</h1>

            <article>

                <h2>Pedido #001</h2>

                <p>
                    Cliente: João Silva
                </p>

                <p>
                    Produtos: X-Burguer, Coca-Cola
                </p>

                <p>
                    Total: R$ 18,00
                </p>

                <label for="status-001">
                    Status:
                </label>

                <select id="status-001">

                    <option>
                        Recebido
                    </option>

                    <option selected>
                        Em preparo
                    </option>

                    <option>
                        Pronto para retirada
                    </option>

                    <option>
                        Entregue
                    </option>

                    <option>
                        Cancelado
                    </option>

                </select>

            </article>


            <article>

                <h2>Pedido #002</h2>

                <p>
                    Cliente: Maria Souza
                </p>

                <p>
                    Produtos: Coxinha, Suco
                </p>

                <p>
                    Total: R$ 10,00
                </p>

                <label for="status-002">
                    Status:
                </label>

                <select id="status-002">

                    <option selected>
                        Recebido
                    </option>

                    <option>
                        Em preparo
                    </option>

                    <option>
                        Pronto para retirada
                    </option>

                    <option>
                        Entregue
                    </option>

                    <option>
                        Cancelado
                    </option>

                </select>

            </article>

        </section>

    </main>


    <footer>

        <nav>

            <a href="privacidade.php">
                Políticas de Privacidade
            </a>

            <a href="termos.php">
                Termos de Uso
            </a>

        </nav>

        <p>
            © 2026 Escola Padre Conrado C. Silva Alves |
            Todos os direitos reservados.
        </p>

    </footer>

</body>

</html>