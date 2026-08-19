<?php 
class Conexao { 
   private $host; 
    private $dbname; 
    private $username; 
    private $password; 
      private $conn; 

      public function __construct() {
        $this->host     = $_ENV['DB_HOST'] ?? 'localhost';
        $this->dbname   = $_ENV['DB_NAME'] ?? 'proj';
        $this->username = $_ENV['DB_USER'] ?? 'root';
        $this->password = $_ENV['DB_PASS'] ?? '';
    }

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
} $banco = new Conexao();
$conn = $banco->exeCon(); 


?>
