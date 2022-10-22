<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    //TODO: Tratar erro
    header("Location: ../view/login.php?logue-logue-imediatamente");
    exit();
}

if (empty($_REQUEST['pd'])){
    //Produto não existente, BUG do site ou falha de segurança
    //TODO: Tratar erro
    header("Location: ../view/produto.php?bugadinho-pai");
    exit();
}

$manager = new Manager();

if (isset($_REQUEST['action'])){
    $produtoId = $_REQUEST['pd'];

    try {
        $deleteFrom = $manager->deleteClient('produto_carrinho', 'id_produto', $produtoId);
    }catch (PDOException $e){
        echo $e->getMessage();
        //TODO: Tratar erro
        exit();
    }

    $paramsSelectCarrinhoInsert = ['id_cliente', 'id_status'];
    $paramsPostSelectInsert = [$_SESSION['USER-ID'], 1];
    $selectCarrinhoVerifyInsert = $manager->selectWhere($paramsSelectCarrinhoInsert, $paramsPostSelectInsert, 'user_carrinho');

    //Fazer o update no carrinho
    $saveValoresTotal = [];
    $saveValoresDeconto = [];
    $saveValoresQauntidade = [];
    $returnProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $selectCarrinhoVerifyInsert[0]['id_carrinho']);

    for ($i = 0, $iMax = count($returnProdutoCarrinho); $i < $iMax; $i++){
        $saveValoresTotal[$i] = $returnProdutoCarrinho[$i]['preco_total'];
        $saveValoresDeconto[$i] = $returnProdutoCarrinho[$i]['preco_desconto_prod'];
        $saveValoresQauntidade[$i] = $returnProdutoCarrinho[$i]['quant_carrinho'];
    }

    //SOMANDO OS VALORES DO ARRAY PARA ADICIONAR À TABELA DE USER_CARRINHO
    $updateCarrinho['total_carrinho'] = array_sum($saveValoresTotal);
    $updateCarrinho['desconto_carrinho']  = array_sum($saveValoresDeconto);
    $updateCarrinho['quant_carrinho']  = array_sum($saveValoresQauntidade);


    //Update no user_carrinho
    try {
        $updateUserCarrinho = $manager->updateClient('user_carrinho', $updateCarrinho, $selectCarrinhoVerifyInsert[0]['id_carrinho'], 'id_carrinho');
        header("Location: ../view/carrinho.php?Deu-certo");
    }catch (PDOException $e){
        echo $e->getMessage();
        //TODO: Tratar erro
        exit();
    }

}else{
    //Falha ao enviar o action voltar ao carrinho
    //TODO: Tratar erro
    header("Location: ../view/carrinho.php?bugadinho-pai");
    exit();
}


