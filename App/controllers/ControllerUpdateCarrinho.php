<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
use app\model\Ferramentas;

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    header("Location: ../view/login.php");
    exit();
}

if (empty($_REQUEST['pd'])){
    //Produto não existente, BUG do site ou falha de segurança
    header("Location: ../view/produto.php");
    exit();
}

$produtoId = $_REQUEST['pd'];
$quantProd = $_REQUEST['quantProd'];
$manager = new Manager();
$ferramentas = new Ferramentas();

if (empty($quantProd)){
    //Falha no recebimento
    header("Location: ../view/produto.php");
    exit();
}


//Checar se o produto já existe na tabela
$checkProd = $manager->getInfo('produto_carrinho', 'id_produto', $produtoId);
if (count($checkProd) > 0){
    //Mudar a quantidade do produto no carrinho
    $getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $produtoId);

    $dadosUpdate['quant_carrinho'] = ($quantProd + $checkProd[0]['quant_carrinho']);
    $dadosUpdate['preco_quant_prod'] = ($getInfoProduto[0]['preco_produto'] * $quantProd) + $checkProd[0]['preco_quant_prod'];
    $dadosUpdate['preco_desconto_prod'] = ($dadosUpdate['preco_quant_prod'] - $checkProd[0]['preco_desconto_prod']);

    //$updateQuery = $manager->updateClient('produto_carrinho', $dadosUpdate, $checkProd[0]['id_produto_carrinho'], 'id_produto_carrinho');

    //Mudar o valor total no carrinho
    $paramsSelectCarrinho = ['id_cliente', 'id_status'];
    $paramsPostSelect = [$_SESSION['USER-ID'], 1];
    $selectCarrinhoVerify = $manager->selectWhere($paramsSelectCarrinho, $paramsPostSelect, 'user_carrinho');
    $saveValores = [1,2,312,45];
    $returnProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $selectCarrinhoVerify[0]['id_carrinho']);

    for ($i = 0, $iMax = count($returnProdutoCarrinho); $i < $iMax; $i++){
        $saveValores[$i] = ($returnProdutoCarrinho[$i]['preco_quant_prod'] - $returnProdutoCarrinho[$i]['preco_desconto_prod']);
    }

    echo array_sum($saveValores);
    //SOMANDO OS VALORES DO ARRAY PARA ADICIONAR À TABELA DE USER_CARRINHO
    //TERMINAR O LAÇO
}




//Checar se Está adicionando um novo produto

//Adicionar novo Produto
//Fazer o update no carrinho


//Adicionar o cupom