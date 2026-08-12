<?php

class Conexao {
    private $host = "localhost";
    private $dbname = "sistema_cantina"; 
    private $user = "root";      
    private $passwword = "";        
    private $charset = 'utf8';
    private $pdo;

    public function __construct(){
        $this->pdo(); 
    }

    private function conectar(){
        if($this->pdo === null){
            try {
                // Monta a string de conexão (DSN) utilizando as suas variáveis
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
                
                $this->pdo = new PDO($dsn, $this->user, $this->passwword);
                
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
            } catch (PDOException $e) {
                die("Erro na conexão POO: " . $e->getMessage());
            }
        }
    }
}
