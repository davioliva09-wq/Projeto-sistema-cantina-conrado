    <?php
class Produto {
    private PDO $db;

    public function __construct(PDO $conn) {
        $this->db = $conn;
    }

    public function listarProdutos(): array {
        $sql = "SELECT id_produto, nome, preco, estoque, categoria, descricao, imagem, disponivel FROM produtos";
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
}
?>
