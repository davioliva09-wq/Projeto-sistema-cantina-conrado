<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Conexao {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    private function conect() {
        // Busca as credenciais diretamente do arquivo .env usando a superglobal $_ENV
        $this->host = $_ENV['DB_HOST'] ?? 'localhost';
        $this->dbname = $_ENV['DB_NAME'] ?? '';
        $this->username = $_ENV['DB_USER'] ?? '';
        $this->password = $_ENV['DB_PASS'] ?? '';
        
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

    public function exeCon() {
        return $this->conect();
    }
}
?>
