<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../routes/conexao.php";
require_once __DIR__ . "/../models/Recuperacao.php";



$token = $_POST["token"];
$password = $_POST["password"];
if(empty($token) || empty($password)){
    die("Um dos campos está vazio");
}

$troca = new Recuperacao($conn);
//$troca->atualizarSenha($token, $password);


if(!$troca->atualizarSenha($token, $password)){
    echo "erro ao atualizar a senha.";
}else{
    echo "senha atualizada com sucesso";
}