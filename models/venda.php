<?php

class Venda
{
    private $id_venda;
    private $data_venda;
    private $id_cliente;

    public static function listar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT v.*, c.nome FROM vendas v left join clientes c on c.id_cliente = v.id_cliente";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function inserir($conexao)
    {
        $sql = "INSERT INTO vendas (id_cliente) VALUES (:cliente)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':cliente', $this->getIdCliente());
        $stmt->execute();
        // retorna o ID da venda que acabou de ser cadastrada
        return $conexao->lastInsertId();
    }


    public function getId()
    {
        return $this->id_venda;
    }

    public function setId($id_venda): void
    {
        $this->id_venda = $id_venda;
    }

    public function getDataVenda()
    {
        return $this->data_venda;
    }

    public function setDataVenda($data_venda): void
    {
        $this->data_venda = $data_venda;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }
}
