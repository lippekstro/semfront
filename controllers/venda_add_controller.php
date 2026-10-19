
<?php
require_once __DIR__ . "/../models/venda.php";
require_once __DIR__ . "/../models/item_venda.php";
require_once __DIR__ . "/../models/produto.php";
require_once __DIR__ . "/../configs/conexao.php";

$cliente = $_POST['cliente'];

$produtos = $_POST['produtos'];
$quantidades = $_POST['quantidades'];

$conexao = Conexao::conectar();
try {
    // inicia a transação para agrupar as operações
    $conexao->beginTransaction();
    // cria um objeto da classe Venda
    $venda = new Venda();
    // define o cliente da venda
    $venda->setIdCliente($cliente);
    // cadastra a venda e recupera seu ID
    $idVenda = $venda->inserir($conexao);

    // percorre os produtos selecionados
    foreach ($produtos as $idProduto) {
        $quantidade = $quantidades[$idProduto];

        // consulta o preço e o estoque atuais do produto no banco
        $stmt = $conexao->prepare("SELECT preco, estoque FROM produtos WHERE id_produto = :produto");
        $stmt->bindValue(':produto', $idProduto);
        $stmt->execute();
        $dadosProduto = $stmt->fetch(PDO::FETCH_ASSOC);

        // verifica se existe estoque suficiente
        if ($quantidade > $dadosProduto['estoque']) {
            throw new Exception("Estoque insuficiente.");
        }

        $item = new ItemVenda();
        $item->setIdVenda($idVenda);
        $item->setIdProduto($idProduto);
        $item->setQuantidade($quantidade);
        $item->setPrecoUnt($dadosProduto['preco']);
        $item->inserir($conexao);

        // diminui o estoque do produto
        $stmt = $conexao->prepare("UPDATE produtos SET estoque = estoque - :quantidade WHERE id_produto = :produto");
        $stmt->bindValue(':quantidade', $quantidade);
        $stmt->bindValue(':produto', $idProduto);
        $stmt->execute();
    }

    // confirma a venda e todos os seus itens
    $conexao->commit();
} catch (Throwable $e) {

    // desfaz as operações se alguma delas falhar
    if ($conexao->inTransaction()) {
        $conexao->rollBack();
    }

    // exibe uma mensagem de erro
    echo $e->getMessage();
}

header('Location: /semfront/index.php');
exit();