<?php


require_once("conexao.php");

class ADM{
    private string $nome;
    private float $preco;
    private int $estoque;
    private string $categoria;
    private string $descricao;
    private $db;


public function __construct(PDO $conexao){
$this->db = $conexao;
}

public function cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao){
    $sql = "INSERT INTO produtos (nome, preco, estoque, categoria, descricao)  VALUES (:nome, :preco, :estoque, :categoria, :descricao)";

    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":estoque", $estoque);
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":descricao", $descricao);




    return $stmt->execute();

}


} 