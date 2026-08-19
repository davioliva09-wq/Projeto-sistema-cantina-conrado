<?php 

class Produto{
    private string $nome;
    private bool $preco;
    private int $quantidade;
    private string $categoria;
    private string $descricao;
    private string $imagem;
    private bool $disponivel;



    public function __construct(string $nome,
    string $preco, int $quantidade, 
     string $categoria, string $descriicao, string $imagem, bool $disponivel){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->categoria = $categoria;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->disponivel = $disponivel;
     }

    public function listarProdutos(): array {
        $sql = "SELECT nome, preco, quantidade, categoria, descricao, imagem FROM produtos";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

return $stmt->fetchAll(PDO::FETCH_ASSOC);
}








public function getNome(){
    
}



}








//getPreco - read
//getNome - read
//getQuantidade - read
//getCategoria - read
//getDescricao - read
//getImagem - read
//getDisponivel