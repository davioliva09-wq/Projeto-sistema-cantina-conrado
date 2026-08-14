<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);






require_once("conexao.php");
require_once("usuario.php");

$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$telefone = $_POST["telefone"] ?? '';
$senha = $_POST["senha"] ?? '';

$usuario = new Usuario($conn);

if ($usuario->cadastrar($nome, $email, $telefone, $senha)) {
    echo "<script> alert('Cadastro realizado com sucesso!'); window.location.href = 'login.php'; </script>";
}
