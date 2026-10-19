<?php

class Cliente {
    private $id_cliente;
    private $nome;
    private $email;
    
    public static function listar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM clientes";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getId()
    {
        return $this->id_cliente;
    }

    public function setId($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }
}