<?php 
class Conexao { 
    private $host; 
    private $port; 
    private $dbname; 
    private $username; 
    private $password; 
    private $conn; 

    private function conect() { 
        $this->host = $_ENV['DB_HOST'] ?? '127.0.0.1'; 
        $this->port = $_ENV['DB_PORT'] ?? '3306'; 
        $this->dbname = $_ENV['DB_NAME'] ?? 'proj'; 
        $this->username = $_ENV['DB_USER'] ?? 'root'; 
        $this->password = $_ENV['DB_PASS'] ?? ''; 
        $this->conn = null; 

        try { 
            $this->conn = new PDO( 
                "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname, 
                $this->username, 
                $this->password 
            ); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) { 
            echo "Erro de conexão: " . $e->getMessage(); 
        } 
        return $this->conn; 
    } 

    public function exeCon() { 
        return $this->conect(); 
    } 
} 

$banco = new Conexao(); 
$conn = $banco->exeCon(); 
?>
