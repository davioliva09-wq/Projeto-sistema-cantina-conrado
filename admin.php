<?php 
require_once 'conexao.php'; 
require_once("usuario.php");


class ADM extends Usuario {     
    private string $nome; 
    private float $preco; 
    private int $estoque; 
    private string $categoria; 
    private string $descricao; 
    private string $imagem; 
    private $db; 

    public function __construct(PDO $conexao) { 
        $this->db = $conexao; 
    } 

    public function cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao, $imagem) { 
        $sql = "INSERT INTO produtos (nome, preco, estoque, categoria, descricao, imagem) VALUES (:nome, :preco, :estoque, :categoria, :descricao, :imagem)"; 
        $stmt = $this->db->prepare($sql); 
        $stmt->bindParam(':nome', $nome); 
        $stmt->bindParam(':preco', $preco); 
        $stmt->bindParam(':estoque', $estoque); 
        $stmt->bindParam(':categoria', $categoria); 
        $stmt->bindParam(':descricao', $descricao); 
        $stmt->bindParam(':imagem', $imagem); 
        return $stmt->execute(); 
    } 

    public function loginAdm($email, $senha) { 
        $sql = "SELECT id, senha FROM users WHERE email = :email AND tipo = 'admin' LIMIT 1"; 
        $stmt = $this->db->prepare($sql); 
        $stmt->bindParam(':email', $email); 
        $stmt->execute(); 
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); 
        
        if ($usuario && password_verify($senha, $usuario['senha'])) { 
            unset($usuario['senha']); 
            return $usuario; 
        } 
        return false; 
    } 

    public function verificaEstoque(int $id) { 
        $sql = "SELECT estoque FROM produtos WHERE id = :id"; 
        $stmt = $this->db->prepare($sql); 
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute(); 
        
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto && (int)$produto['estoque'] === 0) { 
            echo "Produto indisponível"; 
        } 
    } 
}
