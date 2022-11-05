<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    header("Location: ../view/login.php?error-code=OA00");
    exit();
}

if (empty($_REQUEST['pc'])){
    //Produto não existente, BUG do site ou falha de segurança
    header("Location: ../view/produto.php?error-code=FR30");
    exit();
}

$manager = new Manager();

if (isset($_REQUEST['action'])){
    $produtoId = $_REQUEST['pc'];

    try {
        $deleteFrom = $manager->deleteClient('produto_carrinho', 'id_produto_carrinho', $produtoId);
    }catch (PDOException $e){
        echo $e->getCode();
        header("Location: ../view/carrinho.php?error-code=CP03");
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
        header("Location: ../view/carrinho.php?sucess-code=CP51");
    }catch (PDOException $e){
        echo $e->getCode();
        header("Location: ../view/carrinho.php?error-code=CP04");
        exit();
    }

}else{
    //Falha ao enviar o action voltar ao carrinho
    header("Location: ../view/carrinho.php?error-code=CP03");
    exit();
}


