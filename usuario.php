<?php
require_once("conexao.php");

abstract class Usuario{
    public function login($email, $senha){

    }
}




class UsuarioComum extends usuario {
    private PDO $db;
    private string $nome;
    private string $email;
    private string $telefone;
    protected string $senha;

    public function __construct(PDO $conexao) {
        $this->db = $conexao;
    }

    public function cadastrar($nome, $email, $telefone, $senha) {
        if (strlen($senha) < 8) {
            echo "<script> alert('A senha deve ter pelo menos 8 caracteres!'); window.history.back(); </script>";
            return false;
        }
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senhaCriptografada);
        return $stmt->execute();
    }

    public function login($email, $senha) {
        $sql = "SELECT id, email, senha FROM usuarios where email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

public function buscarPorEmail($email){
$sql = "SELECT email from users WHERE email = :email";

$stmt = $this->db->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();

return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function buscaPorNome($nome){
    $sql = "SELECT * from users WHERE nome = :nome";
    $stmt = $this->db->prepare($sql); 
    
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}





}







