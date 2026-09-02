<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("conexao.php");
require_once("admin.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? null;
    $preco = $_POST["preco"] ?? null;
    $estoque = $_POST["estoque"] ?? null;
    $categoria = $_POST["categoria"] ?? null;
    $descricao = $_POST["descricao"] ?? null;
    $imagem = $_FILES["imagem"] ?? null;

    if (!empty($nome) && $preco !== null && $preco !== '') {
        $admService = new ADM($conn);
        $admService->cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao, $imagem);
        
        echo "<script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'perfil-admin.php';
              </script>";
        exit;
    } else {
        echo "<p style='color:red;'>Por favor, preencha todos os campos obrigatórios.</p>";
    }
} else {
    echo "<p style='color:red;'>Método de requisição inválido.</p>";
}
