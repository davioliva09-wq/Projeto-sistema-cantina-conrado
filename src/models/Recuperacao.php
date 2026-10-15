<?php

require_once __DIR__ . '/../routes/conexao.php';

class Recuperacao
{
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function tokenGerar(string $email): string|false
    {
        $sql = "SELECT id, email
                FROM usuarios
                WHERE email = :email
                LIMIT 1";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(['email' => $email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return false;
        }

        $token = bin2hex(random_bytes(32));
        $tokenHash = hash('sha256', $token);

        $expiracao = date(
            'Y-m-d H:i:s',
            time() + 1800
        );

        $sql = "UPDATE usuarios
                SET reset_token_hash = :hash,
                    reset_token_expires = :expiracao
                WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            'hash' => $tokenHash,
            'expiracao' => $expiracao,
            'id' => $usuario['id']
        ]);

        return $token;


    }
    public function veriToken(){
{
    if (empty($token)) {
        return false;
    }

    $token_hash = hash("sha256", $token);

    $sql = "SELECT * FROM usuarios WHERE reset_token_hash = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([$token_hash]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        return false;
    }

    if (strtotime($usuario["reset_token_expires"]) <= time()) {
        return false;
    }

    return $usuario;
}

    }public function atualizarSenha(string $token, string $password): bool 
{
    $token_hash = hash("sha256", $token);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios 
            SET senha = ?, reset_token_hash = NULL, reset_token_expires = NULL 
            WHERE reset_token_hash = ?";

    $stmt = $this->conexao->prepare($sql);
    return $stmt->execute([$password_hash, $token_hash]);
}
}


