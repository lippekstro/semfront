<?php 
require_once __DIR__ . "/models/produto.php";
require_once __DIR__ . "/models/categoria.php";
require_once __DIR__ . "/models/cliente.php";
require_once __DIR__ . "/models/venda.php";
require_once __DIR__ . "/models/item_venda.php";

$produtos = Produto::listar();
$categorias = Categoria::listar();
$clientes = Cliente::listar();
$vendas = Venda::listar();
$items = ItemVenda::listar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sem Front</title>

    <style>
        table, tr, td, th {
            padding: 1rem;
        }
    </style>
</head>
<body>
    
    <hr>
    
    <h2>Categorias</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th colspan="2"><a href="#">Adicionar</a></th>
        </tr>
        <?php foreach($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['nome'] ?></td>
                <td><a href="#">Editar</a></td>
                <td><a href="#">Deletar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>
    
    <h2>Produtos</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Categoria</th>
            <th colspan="2"><a href="#">Adicionar</a></th>
        </tr>
        <?php foreach($produtos as $produto): ?>
            <tr>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['preco'] ?></td>
                <td><?= $produto['estoque'] ?></td>
                <td><?= $produto['nome_produto'] ?></td>
                <td><a href="#">Editar</a></td>
                <td><a href="#">Deletar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <hr>
    
    <h2>Clientes</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th colspan="2"><a href="#">Adicionar</a></th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><a href="#">Editar</a></td>
                <td><a href="#">Deletar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
      
    <hr>
    
    <h2>Vendas</h2>
    <table>
        <tr>
            <th>Data</th>
            <th>Cliente</th>
            <th colspan="2"><a href="#">Adicionar</a></th>
        </tr>
        <?php foreach($vendas as $venda): ?>
            <tr>
                <td><?= $venda['data_venda'] ?></td>
                <td><?= $venda['nome'] ?></td>
                <td><a href="#">Editar</a></td>
                <td><a href="#">Deletar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
     
    <hr>
    
    <h2>Items</h2>
    <table>
        <tr>
            <th>Data da Venda</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Valor da Venda</th>
        </tr>
        <?php foreach($items as $item): ?>
            <tr>
                <td><?= $item['data_venda'] ?></td>
                <td><?= $item['nome_cliente'] ?></td>
                <td><?= $item['nome_produto'] ?></td>
                <td><?= $item['quantidade'] ?></td>
                <td><?= $item['preco_unt'] ?> R$</td>
                <td><?= $item['quantidade'] * $item['preco_unt'] ?> R$</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>