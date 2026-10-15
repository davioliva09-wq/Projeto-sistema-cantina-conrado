<?php
require_once("../routes/conexao.php");
require_once("usuario.php");


if($_SERVER["REQUEST_METHOD"]){
    $email = $_POST["email"];
}