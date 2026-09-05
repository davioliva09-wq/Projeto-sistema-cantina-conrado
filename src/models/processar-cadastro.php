<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../routes/conexao.php';
require_once __DIR__ . '/usuario.php';

$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$telefone = $_POST["telefone"] ?? '';
$senha          = $_POST["senha"] ?? '';
$confirmarSenha = $_POST["confirmar_senha"] ?? ''; 

/*if ($senha !== $confirmarSenha) {
    echo "<script> 
            alert('As senhas não coincidem! Digite a mesma senha nos dois campos.'); 
            window.history.back(); 
          </script>";
    exit; 
}*/
$usuario = new UsuarioComum($conn);

if ($usuario->cadastrar($nome, $email, $telefone, $senha)) {
    echo "<script> alert('Cadastro realizado com sucesso!');
window.location.href = '../views/catalogo.php';
; </script>";
}
