<?php 
class Conexao { 
    private $host = 'localhost'; 
    private $dbname = 'proj'; 
    private $password = ''; 
    private $username = 'root'; 
    private $conn; 

    private function conect(){ 
        $this->conn = null; 
        try { 
            $this->conn = new PDO( 
                "mysql:host=".$this->host.";dbname=".$this->dbname, 
                $this->username, 
                $this->password 
            ); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { 
            echo "Erro de conexão: " . $e->getMessage(); 
        } 
        return $this->conn; 
    } 

    public function exeCon(){ 
        return $this->conect(); 
    } 
} 
?>
