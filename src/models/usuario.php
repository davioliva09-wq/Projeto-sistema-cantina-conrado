<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
require_once __DIR__ . '/../routes/conexao.php';

abstract class Usuario {
    public function login($email, $senha) {
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
        }

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome_completo, email, telefone, senha) VALUES (:nome_completo, :email, :telefone, :senha)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_completo', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senhaCriptografada); 

        if ($stmt->execute()) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            session_unset();
            session_regenerate_id(true);

            $_SESSION['usuario_id'] = $this->db->lastInsertId();
            $_SESSION['usuario_cargo'] = 'COMUM'; 
            $_SESSION['usuario_email'] = $email;
            $_SESSION['logado'] = true;

            return true;
        }

        return false;
    }


    public function login($email, $senha) {
        $sql = "SELECT id_usuario, email, senha, cargo FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_cargo'] = $usuario['cargo'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['logado'] = true;
            
            if ($usuario["cargo"] === "ADM") {
                header("Location: admin-pedidos.php");
                exit();
            }
            return $usuario;
        }
        
        return false;
    }

    public function emailExist($email) {
        $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function buscarPorEmail($email) {
        $sql = "SELECT email FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterarSenha($id, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = :senha WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":senha" => $senhaHash,
            ":id_usuario" => $id
        ]);
    }

    public function buscaPorNome($nome) {
        $sql = "SELECT * FROM usuarios WHERE nome_completo = :nome_completo";
        $stmt = $this->db->prepare($sql); 
        $stmt->bindParam(":nome_completo", $nome);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscaUsuario($busca = '') {
        $sql = "SELECT id_usuario, nome_completo, email, telefone FROM usuarios 
                WHERE id_usuario LIKE :busca OR nome_completo LIKE :busca OR email LIKE :busca OR telefone LIKE :busca";
        $stmt = $this->db->prepare($sql);
        $termo = "%" . $busca . "%";
        $stmt->bindParam(":busca", $termo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateEmail(string $email) {
        $sql = "SELECT id_usuario, email FROM usuarios WHERE email = :email LIMIT 1";
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
?>
