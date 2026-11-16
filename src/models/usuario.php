<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
require_once('../routes/conexao.php');

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
        if (strlen($senha) < 8) {
            echo "<script> alert('A senha deve ter pelo menos 8 caracteres!'); </script>";
            return false;
        } else {
            echo "<script> alert('bela senha') </script>";
        }

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome_completo, email, telefone, senha) VALUES (:nome_completo, :email, :telefone, :senha)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_completo', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senhaCriptografada); 

        return $stmt->execute();
    }

    public function login($email, $senha) {

        $sql = "SELECT id_usuario, email, senha, cargo FROM usuarios where email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_cargo'] = $usuario['cargo'];
        
        if($usuario["cargo"] === "ADM"){
            header("location: admin-pedidos.php");
            exit();}
             return $usuario;
         
    }
    
    return false;
}
    public function emailExist($email){
        $sql = "SELECT * FROM id_usuario from usuarios where email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("email", $email);
 return $stmt->rowCount() > 0;    }

public function buscarPorEmail($email){
$sql = "SELECT email from usuarios WHERE email = :email";

$stmt = $this->db->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();

return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function alterarSenha($id, $senha){
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ":senha" => $senha,
        ":id_usuario" => $id
    ]);
}
    public function buscaPorNome($nome){
    $sql = "SELECT * from usuarios WHERE nome_usuario = :nome_usuario";
    $stmt = $this->db->prepare($sql); 
    
    $stmt->bindParam(":nome_completo", $nome_completo);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function buscaUsuario($busca= ''){
    $sql = "SELECT id_usuario, nome, email, telefone FROM usuarios WHERE id LIKE :busca or nome LIKE :busca or email LIKE :busca or telefone LIKE :busca";
    $stmt = $this->db->prepare($sql);
    $termo = "%" . $busca . "%";
    $stmt->bindParam(":busca", $termo);
    $stmt->execute();
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}


public function validateEmail(string $email){
$sql = "SELECT id_usuario, email FROM usuarios where email = :email LIMIT 1";
$stmt = $this->db->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();
return $stmt->fetch(PDO::FETCH_ASSOC);
}
 public function mostDados($id_usuario) {
    $sql = "SELECT id_usuario, nome_completo, email, telefone FROM usuarios WHERE id_usuario = :id_usuario"; 
    $stmt = $this->db->prepare($sql); 
    $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT); 
    $stmt->execute(); 
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}








