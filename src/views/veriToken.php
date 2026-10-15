<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$token = $_GET["token"] ?? "";

   
require_once __DIR__ . "/../routes/conexao.php";
require_once __DIR__ . "/../models/Recuperacao.php";



$tok = new Recuperacao($conn);
$tok->veriToken();

if(!$tok){
    die("ink inválido ou expirado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
</head>
<body>
    <h2>Digite sua nova senha</h2>
    <form action="atualizar-senha.php" method="POST">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <label for="password">Nova Senha:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Alterar Senha</button>
    </form>
</body>
</html>