<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    header("Location: ../view/login.php?error-code=OA00");
    exit();
}

if (empty($_REQUEST['id_endereco']) || empty($_REQUEST['id_carrinho']) || empty($_REQUEST['frete']) || empty($_REQUEST['codFrete'])){
    //Não Recebeu o ID Endereço ou alguma dessas informações
    header("Location: ../view/pagamento.php?error-code=FR30");
    exit();
}



require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;
use app\model\Ferramentas;
$manager = new Manager();
$ferramentas = new Ferramentas();

$idCarrinho = $_REQUEST['id_carrinho'];
$idEndereco = $_REQUEST['id_endereco'];
$valorFrete = $_REQUEST['frete'];
$codFrete = $_REQUEST['codFrete'];

$checkLogradouro = $ferramentas->antiInjection($_REQUEST['logPayment']);
$checkComplemento = $ferramentas->antiInjection($_REQUEST['compPayment']);
$checkNome = $ferramentas->antiInjection($_REQUEST['titular']);


if ($checkLogradouro === 0 || $checkComplemento === 0){
    //Tentiva de Injection
    header("Location: ../view/pagamento.php?error-code=FR24&id_carrinho=$idCarrinho&id_endereco=$idEndereco&frete=$valorFrete&codFrete=$codFrete");
    exit();
}

$returnCarrinho = $manager->getInfo('user_carrinho', 'id_carrinho', $idCarrinho);
$returnProdutoCarrinho = $manager->getInfo('produto_carrinho', 'id_carrinho', $idCarrinho);

$replaceValueFrete = str_replace(",", ".", $valorFrete);
$valorTotal = $returnCarrinho[0]['total_carrinho'] + $replaceValueFrete;

$insertVendas['id_cliente'] = $_SESSION['USER-ID'];
$insertVendas['id_pagamento'] = 1;
$insertVendas['valor_desconto_total'] = $returnCarrinho[0]['desconto_carrinho'];
$insertVendas['valor_venda_total'] = $valorTotal;
$insertVendas['quant_produto_total'] = $returnCarrinho[0]['quant_carrinho'];
$insertVendas['id_status'] = 1;
$insertVendas['id_carrinho'] = $idCarrinho;
$insertVendas['numero_venda'] = random_int(1000, 10000);
$insertVendas['frete_carrinho'] = $replaceValueFrete;
$insertVendas['id_endereco'] = $idEndereco;
$insertVendas['cod_frete_venda'] = $codFrete;



try {
    $insertVendas = $manager->insertClient('adm_venda', $insertVendas);

    for ($i = 0, $iMax = count($returnProdutoCarrinho); $i < $iMax; $i++){
        $selectProduto = $manager->getInfo('user_produto', 'id_produto', $returnProdutoCarrinho[$i]['id_produto']);
        $menosQuant['quantidade_produto'] = ($selectProduto[0]['quantidade_produto'] - $returnProdutoCarrinho[$i]['quant_carrinho']);
        $updateProduto = $manager->updateClient('user_produto', $menosQuant, $returnProdutoCarrinho[$i]['id_produto'], 'id_Produto');
    }

    $changeStatus['id_status'] = 5;
    $updateCarrinho = $manager->updateClient("user_carrinho", $changeStatus, $idCarrinho, 'id_carrinho');
    $lastInsertPagamento = $manager->lastInsertId('adm_venda', 'id_venda');
    $idVenda = $lastInsertPagamento['id_venda'];

    header("Location: ../view/compra-concluida.php?sucess-code=CP52&venda=$idVenda");
    exit();

}catch (PDOException $e){
    header("Location: ../view/carrinho.php?error-code=CP05");
    echo $e->getCode();
    exit();
}


