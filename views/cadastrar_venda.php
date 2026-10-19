<?php
require_once __DIR__ . "/../models/produto.php";
require_once __DIR__ . "/../models/cliente.php";

$produtos = Produto::listar();
$clientes = Cliente::listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sem Front - Cadastrar Venda</title>
</head>

<body>
    <a href="/semfront/">inicio</a>

    <h1>Cadastrar Venda</h1>

    <form action="/semfront/controllers/venda_add_controller.php" method="post">

        <label for="cliente">Cliente</label>

        <select name="cliente" id="cliente" required>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nome'] ?></option>
            <?php endforeach; ?>
        </select>

        <h2>Produtos</h2>

        <?php foreach ($produtos as $produto): ?>
            <div>
                <input type="checkbox" name="produtos[]" id="produto_<?= $produto['id_produto'] ?>" value="<?= $produto['id_produto'] ?>">
                <label for="produto_<?= $produto['id_produto'] ?>"><?= $produto['nome'] ?>- R$ <?= number_format($produto['preco'], 2, ',', '.') ?></label>

                <label for="quantidade_<?= $produto['id_produto'] ?>">Quantidade</label>
                <input type="number" name="quantidades[<?= $produto['id_produto'] ?>]" id="quantidade_<?= $produto['id_produto'] ?>" max="<?= $produto['estoque'] ?>" min='1' value="1">
            </div>
        <?php endforeach; ?>

        <button type="submit">Cadastrar venda</button>

    </form>

</body>

</html>