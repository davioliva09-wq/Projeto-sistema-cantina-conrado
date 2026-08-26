<?php

$email = $_POST["email"];


$token = bin2hex(random_bytes(16));

//funcao para gerar token 

$token_hash = hash("sha256",$token);


datetime()+60*30;