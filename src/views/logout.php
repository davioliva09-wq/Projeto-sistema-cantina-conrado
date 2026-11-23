<?php
require_once __DIR__ . '/../routes/conexao.php';
require_once __DIR__ . '/../models/usuario.php';

$usuario = new UsuarioComum($conn);
$usuario->logout('index.php');
