<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Manager;
use app\model\Ferramentas;

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

$produtoId = $_REQUEST['pd'];
$quantProd = $_REQUEST['quantProd'];
$manager = new Manager();
$ferramentas = new Ferramentas();

if ($quantProd === '0'){
    //Deletar Produto
    header("Location: ./ControllerDeleteCarrinho.php?action=change&pd=$produtoId");
    exit();
}

if (empty($quantProd)){
    //Falha no recebimento
    //TODO: Tratar erro
    header("Location: ../view/produto.php?falha-recebimento");
    exit();
}

$checkProd = $manager->getInfo('produto_carrinho', 'id_produto', $produtoId);
$getInfoProduto = $manager->getInfo('user_produto', 'id_produto', $produtoId);


//MUDAR A QUANTIDADE DO PRODUTO
if (!empty($_REQUEST['changeQuant'])) {


    //Conferir a quantidade do produto na tabela produto_carrinho
    $dadosUpdate['quant_carrinho'] = $quantProd;
    $dadosUpdate['preco_quant_prod'] = ($getInfoProduto[0]['preco_produto'] * $quantProd);
    //So ira receber um valor, quando aplicado o cupom
    //VALOR: porcentagem do cupom menos o valor do produto.
    $dadosUpdate['preco_desconto_prod'] = $checkProd[0]['preco_desconto_prod']; //VALOR DEFAULT = 0,00
    //Valor da quantidade do produto menos o valor com o desconto
    $dadosUpdate['preco_total'] = ($dadosUpdate['preco_quant_prod'] - $checkProd[0]['preco_desconto_prod']);

    try {
        $updateQuery = $manager->updateClient('produto_carrinho', $dadosUpdate, $checkProd[0]['id_produto_carrinho'], 'id_produto_carrinho');
    } catch (PDOException $e) {
        echo $e->getMessage();
        //TODO: Tratar erro
        exit();
    }

    //Mudar o valor total no carrinho
    $paramsSelectCarrinho = ['id_cliente', 'id_status'];
    $paramsPostSelect = [$_SESSION['USER-ID'], 1];
    $selectCarrinhoVerify = $manager->selectWhere($paramsSelectCarrinho, $paramsPostSelect, 'user_carrinho');
    $saveValoresTotal = [];
    $saveValoresDeconto = [];
    $saveValoresQauntidade = [];
    $returnProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $selectCarrinhoVerify[0]['id_carrinho']);

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
        $updateUserCarrinho = $manager->updateClient('user_carrinho', $updateCarrinho, $selectCarrinhoVerify[0]['id_carrinho'], 'id_carrinho');
        header("Location: ../view/carrinho.php?Deu-certo");
        exit();
    }catch (PDOException $e){
        echo $e->getMessage();
        //TODO: Tratar erro
        exit();
    }
}












//Checar se o produto já existe na tabela
if (count($checkProd) > 0){

    //Conferir a quantidade do produto na tabela produto_carrinho

    if (($checkProd[0]['quant_carrinho'] + $quantProd) > $getInfoProduto[0]['quantidade_produto']){
        $dadosUpdate['quant_carrinho'] = $getInfoProduto[0]['quantidade_produto'];
        $dadosUpdate['preco_quant_prod'] = ($getInfoProduto[0]['preco_produto'] * $getInfoProduto[0]['quantidade_produto']);
        //So ira receber um valor, quando aplicado o cupom
        //VALOR: porcentagem do cupom menos o valor do produto.
        $dadosUpdate['preco_desconto_prod'] = $checkProd[0]['preco_desconto_prod']; //VALOR DEFAULT = 0,00
        //Valor da quantidade do produto menos o valor com o desconto
        $dadosUpdate['preco_total'] = ($dadosUpdate['preco_quant_prod'] - $checkProd[0]['preco_desconto_prod']);

        try {
            $updateQuery = $manager->updateClient('produto_carrinho', $dadosUpdate, $checkProd[0]['id_produto_carrinho'], 'id_produto_carrinho');
        }catch (PDOException $e){
            echo $e->getMessage();
            //TODO: Tratar erro
            exit();
        }
    }else {


        //Mudar a quantidade do produto no carrinho
        $dadosUpdate['quant_carrinho'] = ($quantProd + $checkProd[0]['quant_carrinho']);
        $dadosUpdate['preco_quant_prod'] = ($getInfoProduto[0]['preco_produto'] * $quantProd) + $checkProd[0]['preco_quant_prod'];
        //So ira receber um valor, quando aplicado o cupom
        //VALOR: porcentagem do cupom menos o valor do produto.
        $dadosUpdate['preco_desconto_prod'] = $checkProd[0]['preco_desconto_prod']; //VALOR DEFAULT = 0,00
        //Valor da quantidade do produto menos o valor com o desconto
        $dadosUpdate['preco_total'] = ($dadosUpdate['preco_quant_prod'] - $checkProd[0]['preco_desconto_prod']);

        try {
            $updateQuery = $manager->updateClient('produto_carrinho', $dadosUpdate, $checkProd[0]['id_produto_carrinho'], 'id_produto_carrinho');
        } catch (PDOException $e) {
            echo $e->getMessage();
            //TODO: Tratar erro
            exit();
        }
    }


    //Mudar o valor total no carrinho
    $paramsSelectCarrinho = ['id_cliente', 'id_status'];
    $paramsPostSelect = [$_SESSION['USER-ID'], 1];
    $selectCarrinhoVerify = $manager->selectWhere($paramsSelectCarrinho, $paramsPostSelect, 'user_carrinho');
    $saveValoresTotal = [];
    $saveValoresDeconto = [];
    $saveValoresQauntidade = [];
    $returnProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $selectCarrinhoVerify[0]['id_carrinho']);

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
        $updateUserCarrinho = $manager->updateClient('user_carrinho', $updateCarrinho, $selectCarrinhoVerify[0]['id_carrinho'], 'id_carrinho');
        header("Location: ../view/carrinho.php?Deu-certo");
        exit();
    }catch (PDOException $e){
        echo $e->getMessage();
        //TODO: Tratar erro
        exit();
    }

}



//Checar se adiciona um novo produto

//Adicionar novo Produto
$paramsSelectCarrinhoInsert = ['id_cliente', 'id_status'];
$paramsPostSelectInsert = [$_SESSION['USER-ID'], 1];
$selectCarrinhoVerifyInsert = $manager->selectWhere($paramsSelectCarrinhoInsert, $paramsPostSelectInsert, 'user_carrinho');
$getProduto = $manager->getInfo('user_produto', 'id_produto', $produtoId);
$returnModelProduto = $manager->getInfo('user_mod_celular', 'id_modelo_celular', $getProduto[0]['id_modelo_celular']);


$dadosInsert['id_carrinho'] = $selectCarrinhoVerifyInsert[0]['id_carrinho'];
$dadosInsert['id_produto'] = $getProduto[0]['id_produto'];
$dadosInsert['quant_carrinho'] = $quantProd;
$dadosInsert['preco_quant_prod'] = ($getProduto[0]['preco_produto'] * $quantProd);
$dadosInsert['preco_total'] = ($getProduto[0]['preco_produto'] * $quantProd);
$dadosInsert['marca_celular'] = $returnModelProduto[0]['modelo_celular'];

try {
    $inserNewProd = $manager->insertClient('produto_carrinho', $dadosInsert);
}catch (PDOException $e){
    echo $e->getMessage();
    //TODO: Tratar errro
    exit();
}

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




//TODO: Adicionar o cupom