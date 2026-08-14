<?php
require_once("processar-cad-prod");

class Produto{
    private string $nome;
    private float $preco;
    private int $estoque;
    private string $categoria;
    private $db;


public function __construct(PDO $db){
$this->db = $db;
}

public function cadastrarProduto($nome, $preco, $estoque, $categoria){
    $sql = "INSERT INTO produtos (nome, preco, estoque, categoria)  VALUES (:nome, :preco, :estoque, :categoria)";

    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":estoque", $estoque);
    $stmt->bindParam(":categoria", $categoria);



    return $stmt->execute();

}


} 