<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once("conexao.php");
require_once("admin.php");


$nome = $_POST["nome"];
$preco = $_POST["preco"];
$estoque = $_POST["estoque"];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];

$produto = new ADM($conn);

$produto->cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao);
echo "<script>
    alert('Produto cadastrado com sucesso!');
    window.location.href = 'privacidade.php';
</script>";