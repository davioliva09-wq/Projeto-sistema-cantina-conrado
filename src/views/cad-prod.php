<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../../routes/conexao.php");
require_once("../models/admin.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? null;
    $preco = $_POST["preco"] ?? null;
    $estoque = $_POST["estoque"] ?? null;
    $categoria = $_POST["categoria"] ?? null;
    $descricao = $_POST["descricao"] ?? null;
$nome_imagem_final = null; 

if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
    $diretorio_destino = "../images/"; 

    

    $extensao = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
    $nome_imagem_final = uniqid() . "." . $extensao; 
    
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio_destino . $nome_imagem_final);
}

    if (!empty($nome) && $preco !== null && $preco !== '') {
        $admService = new ADM($conn);
        $admService->cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao, $nome_imagem_final);
        
        echo "<script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'admin-usuarios.php';
              </script>";
        exit;
    } else {
        echo "<p style='color:red;'>Por favor, preencha todos os campos obrigatórios.</p>";
    }
} else {
    echo "<p style='color:red;'>Método de requisição inválido.</p>";
}
