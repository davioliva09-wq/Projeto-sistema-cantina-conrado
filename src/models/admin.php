<?php
require_once('../routes/conexao.php');
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
        $disponivel = ($estoque > 0) ? 1 : 0;

        $sql = "INSERT INTO produtos (nome, preco, estoque, categoria, descricao, imagem, disponivel) 
                VALUES (:nome, :preco, :estoque, :categoria, :descricao, :imagem, :disponivel)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':disponivel', $disponivel);
        return $stmt->execute();
    }

    public function loginAdm($email, $senha) {
        $sql = "SELECT id_usuario, senha FROM users WHERE email = :email AND tipo = 'admin' LIMIT 1";
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

    

    public function veriStatus($status, $estoque) {
        if ($estoque < 1) {
            return 'indisponivel';
        } else {
            return 'disponivel';
        }
    }

    public function mostDadosAdm($id_usuario) {
        
        $sql = "SELECT id_usuario, nome_completo, email, telefone 
                FROM usuarios 
                WHERE cargo = 'ADM' AND id_usuario = :id_usuario";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}