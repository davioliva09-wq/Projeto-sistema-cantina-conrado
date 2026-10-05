<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once("../src/core/router.php");

$url = $_GET["url"] ?? '';
        //echo "url: ".$url;
        
$nada = new Router();
$nada->dispatch($url);  