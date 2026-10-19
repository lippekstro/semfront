<?php

class Categoria {
    private $id_categoria;
    private $nome;

    public static function listar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM categorias";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id_categoria;
    }

    public function setId($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
}