<?php

session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
use app\model\Ferramentas;

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    //TODO: Tratar erro
    header("Location: ../view/login.php");
    exit();
}

if (empty($_REQUEST['idProduto'])){
    //Produto não existente, BUG do site ou falha de segurança
    //TODO: Tratar erro
    header("Location: ../view/produto.php");
    exit();
}

$manager = new Manager();
$ferramentas = new Ferramentas();
$getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $_REQUEST['idProduto']);
$returnModelProduto = $manager->getInfo('user_mod_celular', 'id_modelo_celular', $getInfoProduto[0]['id_modelo_celular']);

//Adicionar no produto carrinho
$quantidadeProduto = $_REQUEST['quantProduto'];

if (empty($quantidadeProduto)){
    //Falha no recebimento
    //TODO: Tratar erro
    header("Location: ../view/produto.php");
}

//Verificar se o cliente já adicionou algo no carrinho antes
$paramsSelectCarrinho = ['id_cliente', 'id_status'];
$paramsPostSelect = [$_SESSION['USER-ID'], 1];
$selectCarrinhoVerify = $manager->selectWhere($paramsSelectCarrinho, $paramsPostSelect, 'user_carrinho');

$idProduto = $_REQUEST['idProduto'];

if (count($selectCarrinhoVerify) > 0){
    //Redirecionar para o controller update
    header("Location: ./ControllerUpdateCarrinho.php?pd=$idProduto&quantProd=$quantidadeProduto");
    exit();
}


//Calcular o subtotal do produto
$precoQuantProduto = $getInfoProduto[0]['preco_produto'] * $quantidadeProduto;



//Dados Insert USER_CARRINHO - Criando o carrinho do zero
$dadosCarrinho['id_cliente'] = $_SESSION['USER-ID'];
$dadosCarrinho['total_carrinho'] = $precoQuantProduto;
$dadosCarrinho['quant_carrinho'] = $quantidadeProduto;
$dadosCarrinho['id_status'] = 1;

try {
    $insertCarrinho = $manager->insertClient('user_carrinho', $dadosCarrinho);
}catch (PDOException $e){
    //TODO: Tratar erro
    echo $e->getMessage();
    exit();
}


$lastInsertIDCarrinho = $manager->lastInsertId('user_carrinho', 'id_carrinho');

//Dados Insert PRODUTO_CARRINHO
$dadosProdCarrinho['id_carrinho'] = $lastInsertIDCarrinho[0];
$dadosProdCarrinho['id_produto'] = $getInfoProduto[0]['id_produto'];
$dadosProdCarrinho['quant_carrinho'] = $quantidadeProduto;
$dadosProdCarrinho['preco_quant_prod'] = $precoQuantProduto;
$dadosProdCarrinho['marca_celular'] = $returnModelProduto[0]['modelo_celular'];


try {
    $insertProdCarrinho = $manager->insertClient('produto_carrinho', $dadosProdCarrinho);
    header('Location: ../view/carrinho.php');
    //TODO: Tratar erro
    exit();

}catch (PDOException $e){
    echo $e->getMessage();
    //TODO: Tratar erro
    header('Location: ../view/produto.php');
    exit();
}






