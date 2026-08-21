<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("conexao.php");
require_once("admin.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];
    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    $imagem = $_FILES["image"];

    if(!empty($nome) && !empty($preco)){
        $produto = new ADM($conn);
        
        if($produto->cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao, $imagem)){
            echo "<script>
                    alert('Produto cadastrado com sucesso!');
                    window.location.href='catalogo.php';
                  </script>";
        } else {
            echo "erro ao cadastrar produto";
        }
    } else {
        echo "<p style='color:red;'>Por favor, preencha todos os campos obrigatórios.</p>";
    }
}
