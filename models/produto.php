<?php
require_once __DIR__ . "/../configs/conexao.php";

class Produto {
    private $id_produto;
    private $nome;
    private $preco;
    private $estoque;
    private $id_categoria;

    public static function listar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT p.*, c.nome as nome_produto FROM produtos p left join categorias c on p.id_categoria = c.id_categoria";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id_produto;
    }

    public function setId($id_produto): void
    {
        $this->id_produto = $id_produto;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque): void
    {
        $this->estoque = $estoque;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }
}