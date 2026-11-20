<?php

class Carrinho {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
    }

    public function addCarrinho($id_produto, $quantidade = 1, $estoque = null) {
        $id_produto = (int) $id_produto;
        $quantidade = (int) $quantidade;

        if ($id_produto <= 0 || $quantidade <= 0) {
            return false;
        }

        $qtdAtual = $_SESSION['carrinho'][$id_produto] ?? 0;
        $novaQtd = $qtdAtual + $quantidade;

        if ($estoque !== null && $novaQtd > (int)$estoque) {
            $_SESSION['erro_carrinho'] = "Quantidade indisponível! Temos apenas {$estoque} unidade(s) em estoque.";
            return false;
        }

        $_SESSION['carrinho'][$id_produto] = $novaQtd;
        return true;
    }

    public function getMensagemErro() {
        if (isset($_SESSION['erro_carrinho'])) {
            $msg = $_SESSION['erro_carrinho'];
            unset($_SESSION['erro_carrinho']); 
            return $msg;
        }
        return null;
    }

    public function remover($id_produto) {
        unset($_SESSION['carrinho'][(int) $id_produto]);
    }

    public function limpar() {
        unset($_SESSION['carrinho']);
    }

    public function getItens() {
        return $_SESSION['carrinho'] ?? [];
    }

    public function contarItens() {
        return array_sum($_SESSION['carrinho'] ?? []);
    }

    public function estaVazio() {
        return empty($_SESSION['carrinho']);
    }
}
