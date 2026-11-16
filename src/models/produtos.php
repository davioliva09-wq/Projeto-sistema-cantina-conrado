<?php
class Produto {
    private PDO $db;

    public function __construct(PDO $conn) {
        $this->db = $conn;
    }
   public function editarProduto(
    int $id_produto,
    string $nome,
    float $preco,
    int $estoque,
    string $categoria,
    string $descricao,
    string $imagem,
    bool $disponivel
): bool {
    try {
        $sql = "UPDATE produtos SET 
                    nome = :nome, 
                    preco = :preco, 
                    estoque = :estoque, 
                    categoria = :categoria, 
                    descricao = :descricao, 
                    imagem = :imagem, 
                    disponivel = :disponivel 
                WHERE id_produto = :id_produto";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":estoque", $estoque, PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
        $stmt->bindParam(":imagem", $imagem, PDO::PARAM_STR);
        $stmt->bindParam(":disponivel", $disponivel, PDO::PARAM_BOOL);

        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}


    public function listarProdutos(): array { 
        $sql = "SELECT id_produto AS id, nome, preco, estoque, categoria, descricao, imagem, disponivel FROM produtos"; 
        $stmt = $this->db->prepare($sql); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 

    public function deletarProduto(int $id_produto): bool {
        try {
            $sql = "DELETE FROM produtos WHERE id_produto = :id_produto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    public function verificaEstoque(int $id) {
        $sql = "SELECT estoque FROM produtos WHERE id_produto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto && (int)$produto['estoque'] === 0) {
            echo "Produto indisponível";
        }
    }

    public function buscaProdNome(string $nome) {
        $sql = "SELECT id_produto AS id, nome, preco, estoque, categoria, descricao, imagem, disponivel 
                FROM produtos 
                WHERE nome LIKE :pesquisa";
        $stmt = $this->db->prepare($sql);
        $pesquisa = "%" . $nome . "%";
        $stmt->bindValue(':pesquisa', $pesquisa, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
public function buscarPorId(int $id_produto): ?array {
    $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado ?: null;
}

    }
?>
