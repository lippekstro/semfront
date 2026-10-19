<?php

class ItemVenda
{
    private $id_item;
    private $id_venda;
    private $id_produto;
    private $quantidade;
    private $preco_unt;

    public static function listar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT i.*, c.nome as nome_cliente, p.nome as nome_produto, v.data_venda FROM item_venda i 
            join vendas v on i.id_venda = v.id_venda 
            join clientes c on v.id_cliente = c.id_cliente 
            join produtos p on i.id_produto = p.id_produto";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id_item;
    }

    public function setId($id_item): void
    {
        $this->id_item = $id_item;
    }

    public function getIdVenda()
    {
        return $this->id_venda;
    }

    public function setIdVenda($id_venda): void
    {
        $this->id_venda = $id_venda;
    }

    public function getIdProduto()
    {
        return $this->id_produto;
    }

    public function setIdProduto($id_produto): void
    {
        $this->id_produto = $id_produto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getPrecoUnt()
    {
        return $this->preco_unt;
    }

    public function setPrecoUnt($preco_unt): void
    {
        $this->preco_unt = $preco_unt;
    }
}
