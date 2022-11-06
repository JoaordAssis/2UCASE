<?php
session_start();

if (empty($_SESSION['USER-ID'])){
    //Usuário não logado
    header("Location: ../view/login.php?error-code=OA00");
    exit();
}

require_once __DIR__ . "/../../vendor/autoload.php";

use app\model\Manager;
use app\model\Ferramentas;

$manager = new Manager();
$ferramentas = new Ferramentas();
$valorFrete = $_REQUEST['frete'];
$idCarrinho = $_REQUEST['id_carrinho'];

//Chave 0 é o Valor do frete
//Chave 1 é o Codigo do frete
$explodeCep = explode(" ", $valorFrete);

$replaceValue = str_replace(",", ".", $explodeCep[0]);
$valueFrete = (float)($replaceValue);
$codigoFrete = $explodeCep[1];

if (empty($valueFrete)) {
    //Não recebido o valor frete
    header("Location: ../view/entrega.php?error-code=FR33&carrinho=$idCarrinho");
    exit();
}

$inputEntrega['id_cliente'] = $_SESSION['USER-ID'];
$inputEntrega['logradouro_cliente'] = filter_input(INPUT_GET, 'logradouro');
$inputEntrega['cep_cliente'] = filter_input(INPUT_GET, 'cep');
$inputEntrega['ponto_ref_cliente'] = $_REQUEST['referencia'];
$inputEntrega['uf_cliente'] = filter_input(INPUT_GET, 'state');
$inputEntrega['cidade_cliente'] = filter_input(INPUT_GET, 'cidade');
$inputEntrega['numero_cliente'] = filter_input(INPUT_GET, 'numero');
$inputEntrega['complemento_cliente'] = filter_input(INPUT_GET, 'complemento');
$inputEntrega['bairro_cliente'] = filter_input(INPUT_GET, 'bairro');
$inputEntrega['nomeR_cliente'] = filter_input(INPUT_GET, 'nomeR');

$injectionCheckLog = $ferramentas->antiInjection($inputEntrega['logradouro_cliente']);
$injectionCheckBairro = $ferramentas->antiInjection($inputEntrega['bairro_cliente'] );
$injectionCheckRef = $ferramentas->antiInjection($inputEntrega['ponto_ref_cliente']);
$injectionCheckCidade = $ferramentas->antiInjection($inputEntrega['cidade_cliente']);
$injectionCheckNomeR = $ferramentas->antiInjection($inputEntrega['nomeR_cliente']);
$injectionCheckComp = $ferramentas->antiInjection($inputEntrega['complemento_cliente']);


if ($injectionCheckBairro === 0 || $injectionCheckCidade === 0 || $injectionCheckLog === 0
    || $injectionCheckNomeR === 0 || $injectionCheckRef === 0 || $injectionCheckComp === 0) {
    //Tentativa de Injection
    header("Location: ../view/entrega.php?error-code=FR24&carrinho=$idCarrinho");
    exit();
}

try {
    $insertEndereco = $manager->insertClient('user_endereco_cliente', $inputEntrega);
    $returnEndereco = $manager->lastInsertId('user_endereco_cliente', 'id_endereco');
    $idEntrega = $returnEndereco['id_endereco'];
    header("Location: ../view/pagamento.php?frete=$valueFrete&id_endereco=$idEntrega&id_carrinho=$idCarrinho&codFrete=$codigoFrete");
    exit();
}catch (PDOException $e){
    echo $e->getMessage();
    header("Location: ../view/carrinho.php");
    exit();
}