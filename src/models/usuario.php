<?php
require_once __DIR__ . '/../../routes/conexao.php';
abstract class Usuario{
    public function login($email, $senha){

    }
}




class UsuarioComum extends Usuario {
    private PDO $db;
    private string $nome;
    private string $email;
    private string $telefone;
    protected string $senha;

    public function __construct(PDO $conexao) {
        $this->db = $conexao;
    }

    public function cadastrar($nome, $email, $telefone, $senha) {
        if (strlen($senha) > 8) {
            echo "<script> alert('A senha deve ter pelo menos 8 caracteres!');
             </script>";
            return false;
        }else{
            echo "<script> alert('bela senha')
            </script>";
        }
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senhaCriptografada);
        return $stmt->execute();
    }

    public function login($email, $senha) {
        $sql = "SELECT id, email, senha FROM users where email = :email";
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

<<<<<<< HEAD:usuario.php
public function alterarSenha($id, $senha){
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ":senha" => $senha,
        ":id" => $id
    ]);
}
=======
public function buscaPorNome($nome){
    $sql = "SELECT * from users WHERE nome = :nome";
    $stmt = $this->db->prepare($sql); 
    
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


>>>>>>> b3994af8aec536fb0cfb430e3bebd4501634504f:src/models/usuario.php





}







